
## Демо сайт
http://demo.site.com


Установка
------------

1. Запустить в командной строке

```
$ git clone https://webhovhannisyan@bitbucket.org/webhovhannisyan/news-catalog.git
$ cd /news-catalog
$ composer install
```

### Подключение к базе данных

2. Отредактируем конфиг приложения: /config/db.php

``` 
[
  'class' => 'yii\db\Connection',
      'dsn' => 'mysql:host=ваш_хост_базы;dbname=имя_вашей_базы_данных',
      'username' => 'ваше_имя_пользователя',
      'password' => 'пароль',
      'charset' => 'utf8',
]
```

3. Применяем миграцию

```
$ php yii migrate
```

В результате применения миграций будут добавлены таблицы и заполнятся тестовыми данными


 * news  - для хранения новости
 * rubric  - для хранения рубрики
 
 
4. Запускаем сервер
 
```
$ php yii serve
```

  http://localhost:8080/
   
   
### Ссылки для доступа api


* http://localhost:8080/rubric

```
[
      {
        "id": 1,
        "name": "Общество",
        "parent_id": null,
        "news": [
          {
            "id": 1,
            "title": "Non expedita et nihil iure.",
            "body": "Dolorem doloremque delectus veniam blanditiis ..."
          },
          ...
        ],
        "rubrics": [
          {
            "id": 6,
            "name": "городская жизнь",
            "parent_id": 1,
            "news": [
              {
                "id": 53,
                "title": "Quasi est iste nobis.",
                "body": "Corporis et et veniam at aut. Cumque ..."
              }
            ],
            "rubrics": []
          },
          ...
        ]
      },
      ...
]
```


* http://localhost:8080/rubric/{id}

```
  {
    "id": 1,
    "name": "Общество",
    "parent_id": null,
    "news": [
      {
        "id": 1,
        "title": "Non expedita et nihil iure.",
        "body": "Dolorem doloremque delectu ..."
      },
      ...
    ],
    "rubrics": [
      {
        "id": 6,
        "name": "городская жизнь",
        "parent_id": 1,
        "news": [
          {
            "id": 53,
            "title": "Quasi est iste nobis.",
            "body": "Corporis et et veniam ..."
          }
        ],
        "rubrics": []
      },
      ...
    ]
  }
```



* http://localhost:8080/news

```
[
    {
        "id": "5",
        "title": "Tempora eveniet in quidem.",
        "body": "Libero nisi est nihil ... ",
        "rubrics": [
            {
                "id": "1",
                "name": "Общество",
                "parent_id": null
            },
            ...
        ]
    },
]
```



* http://localhost:8080/news/{id}

```
{
    "id": "5",
    "title": "Tempora eveniet in quidem.",
    "body": "Libero nisi est nihil eaque mollitia ...",
    "rubrics": [
        {
            "id": "1",
            "name": "Общество",
            "parent_id": null
        },
        ...
    ]
}
```


