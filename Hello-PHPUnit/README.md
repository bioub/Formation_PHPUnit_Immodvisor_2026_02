## Exercice 3 : Doublures de Test (Mocks & Stubs)
**Objectif :** Isoler le code testé en simulant ses dépendances externes.

1.  Créez une interface `MailerInterface` avec une méthode `send(string $to, string $subject, string $body): bool`.
2.  Créez une classe `NewsletterManager` qui prend `MailerInterface` dans son constructeur.
3.  La méthode `subscribe(string $email)` de `NewsletterManager` doit appeler la méthode `send` du mailer avec un sujet de bienvenue.
4.  Dans `NewsletterManagerTest`, créez un mock de `MailerInterface` avec `$this->createMock(MailerInterface::class)`.
5.  Configurez le mock pour qu'il s'attende à recevoir un appel à `send` avec les bons arguments (`expects($this->once())`, `with(...)`).
6.  Vérifiez que `subscribe` retourne `true` si le mailer a réussi l'envoi.

---

## Exercice 4 : Organisation & Attributs Avancés
**Objectif :** Structurer sa suite de tests pour la performance et la clarté.

1.  Ajoutez l'attribut `#[CoversClass(Calculator::class)]` à votre classe `CalculatorTest` et remettez en place les paramètres d'origine de phpunit.xml
2.  Marquez vos tests unitaires avec l'attribut `#[Small]` pour indiquer qu'ils sont rapides et isolés, utilisez l'option du CLI pour ne lancer que les tests small.
3.  Utiliser un DataProvider et/ou l'attribut `#[TestWith] pour tester les valeurs de `Calculator::sum` avec plusieurs nombres.