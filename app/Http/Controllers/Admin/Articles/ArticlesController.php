<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Articles;

use App\Domain\Articles\Article;
use App\Http\Controllers\Controller;
use App\Repositories\ArticlesRepository;
use App\View\Admin\Articles\ArticlesEditForm;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function add(ArticlesRepository $repository)
    {
        $user = \Auth::user();
        $article = $repository->getDraft($user);
        if (!$article) {
            $article = $repository->makeNew();
            $article->setUser($user);
            $repository->save($article);
        }
        return redirect()->route('admin.articles.edit', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        $form = new ArticlesEditForm();
        $form->fill($article);
        return $form->render();
    }

    public function store(Article $article, ArticlesRepository $repository, Request $request)
    {
        $form = new ArticlesEditForm();
        $rules = $form->getRules();
        $v = \Validator::make($request->all(), $rules);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }
        $form->process($request);
        $data = $form->values();
        $filesFields = ['small_image', 'medium_image', 'full_image'];
        $files = [];
        foreach ($filesFields as $fileFieldCode) {
            $files[$fileFieldCode] = $data[$fileFieldCode];
            unset($data[$fileFieldCode]);
        }
        $article->fill($data);
        foreach ($filesFields as $fileFieldCode) {
            if ($files[$fileFieldCode]) {
                $article->{$fileFieldCode} = $files[$fileFieldCode]->storeAs(
                    'i/articles/' . $article->id,
                    $files[$fileFieldCode]->getClientOriginalName(),
                    'public'
                );
            }
        }
        $article->setPublishStatus($data['published']);
        $article->setUser(\Auth::user());
        $repository->save($article);
        return redirect()->route('admin.articles.list');
    }

    public function delete(Article $article, ArticlesRepository $repository)
    {
        $article->setUser(\Auth::user());
        $repository->remove($article);

        return redirect()->route('admin.articles.list');
    }
}
