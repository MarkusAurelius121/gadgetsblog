<?php

class ArticleFormCest
{
    // Тест для створення статті з правильними даними
    public function createArticleWithValidData(FunctionalTester $I)
    {
        $I->amOnPage('/admin/article/create');  // Перехід на сторінку створення статті
        $I->see('Створити статтю');  // Перевіряємо, чи є заголовок на сторінці

        // Заповнюємо поля форми
        $I->fillField('input[name="Article[title]"]', 'New Article Title');  // Title
        $I->fillField('textarea[name="Article[description]"]', 'This is the description of the article.');  // Description
        $I->fillField('textarea[name="Article[content]"]', 'Here is the content of the article.');  // Content
        $I->fillField('input[name="Article[date]"]', '2024-12-07');  // Date

        // Надсилаємо форму
        $I->click('Зберегти');  

        // Перевіряємо результат
        $I->seeInCurrentUrl('/admin/article/index');  // Очікуємо перенаправлення на сторінку списку статей
        $I->see('New Article Title');  // Перевіряємо, що нова стаття з’явилася на сторінці
    }

    // Тест для створення статті без заголовка
    public function createArticleWithMissingTitle(FunctionalTester $I)
    {
        $I->amOnPage('/admin/article/create');
        $I->see('Створити статтю');

        // Заповнюємо всі поля, крім title
        $I->fillField('textarea[name="Article[description]"]', 'Description without a title');
        $I->fillField('textarea[name="Article[content]"]', 'Content without a title');
        $I->fillField('input[name="Article[date]"]', '2024-12-07');

        $I->click('Зберегти');  // Надсилаємо форму

        // Перевіряємо, чи з’явилося повідомлення про помилку
        $I->see('Title cannot be blank.');
    }

    // Тест для створення статті з некоректною датою
    public function createArticleWithInvalidDate(FunctionalTester $I)
    {
        $I->amOnPage('/admin/article/create');
        $I->see('Створити статтю');

        // Заповнюємо форму, але вводимо некоректну дату
        $I->fillField('input[name="Article[title]"]', 'Article with Invalid Date');
        $I->fillField('textarea[name="Article[description]"]', 'This is a valid description.');
        $I->fillField('textarea[name="Article[content]"]', 'Content of the article.');
        $I->fillField('input[name="Article[date]"]', 'Invalid Date');  // Некоректна дата

        $I->click('Зберегти');  // Надсилаємо форму

        // Перевіряємо, що з’явилося повідомлення про помилку для дати
        $I->see('Date is not a valid date.');
    }

    // Тест для створення статті з порожніми полями
    public function createArticleWithEmptyFields(FunctionalTester $I)
    {
        $I->amOnPage('/admin/article/create');
        $I->see('Створити статтю');

        // Клікаємо "Save" без заповнення полів
        $I->click('Save');

        // Перевіряємо, чи з’явилися помилки для кожного порожнього поля
        $I->see('Title cannot be blank.');
        $I->see('Description cannot be blank.');
        $I->see('Content cannot be blank.');
        $I->see('Date cannot be blank.');
    }
}
