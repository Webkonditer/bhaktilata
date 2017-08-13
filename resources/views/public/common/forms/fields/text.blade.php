<textarea class="form-control"
          name="{{ $field->getCode() }}"
          id="{{ $field->getName() }}"
          rows="{{ $field->getParameter('rows') ?: 10 }}"
          placeholder="Внимание! Мы готовы размещать вебинары и видео только от зарекомендовавших себя проектов!">{{ $field->getValue() }}</textarea>