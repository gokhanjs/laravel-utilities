## Usage

### Create a new model using TranslationTrait

#### By default, the Translation Trait will match with the translation model located in the `Translations` folder within the directory of the model.

![BaseModelDefinition](/readme/base-model-definition.png)

### Create a new model under Translations folder

#### When defining the translation model, it should be named as the main model name + Translation.
#### For example, for the `Product` model, it should be defined as `ProductTranslation`.
#### If a different naming convention is used, the translation model can be specified in the main model via the `translationClass` method.

![BaseModelDefinition](/readme/translation-model-definition.png)

### Accessing Translation Data

#### To access translation data, the `activeLanguage` method or the `translations` method can be used.
#### The `activeLanguage` method allows access to translation data in the active language. 
#### The `translations` method allows access to all language translations.
#### The `activeLanguage` method works based on the value of app()->getLocale().

![BaseModelDefinition](/readme/usage.png)