# Exercices de Tests Automatisés avec Symfony

Ce document contient une série d'exercices pour s'entraîner aux tests automatisés dans un projet Symfony. Nous utiliserons la commande `bin/console make:test` pour générer les squelettes de tests.

## 1. KernelTestCase (Test d'intégration)

**Objectif :** Tester un service qui dépend du conteneur de services de Symfony.

**Exercice :**
1. Générez un test de type `KernelTestCase` pour le service `ContactManager` :
   ```bash
   bin/console make:test KernelTestCase ContactManagerTest
   ```
2. Dans ce test, récupérez le service `App\Manager\ContactManager` depuis le conteneur.
3. Vérifiez que la méthode `findAll()` retourne bien un tableau et que ce tableau contient exactement 2 contacts (Bill et Steve, comme défini dans le constructeur du manager).

---

## 2. WebTestCase (Test fonctionnel sans Mock)

**Objectif :** Tester une page HTML complète en simulant un navigateur, en utilisant la base de données réelle (ou de test).

**Exercice :**
1. Générez un test de type `WebTestCase` pour la liste des entreprises :
   ```bash
   bin/console make:test WebTestCase CompanyControllerTest
   ```
2. Créez une méthode `testIndex()` qui :
   - Crée un client HTTP Symfony.
   - Envoie une requête GET sur `/companies`.
   - Vérifie que la réponse est un succès (HTTP 200).
   - Vérifie que le titre `<h1>` (ou un sélecteur approprié) contient bien "Liste des entreprises" (vérifiez le template `company/index.html.twig` pour le texte exact).

---

## 3. WebTestCase avec Mock

**Objectif :** Tester un contrôleur en isolant les dépendances (services/répertoires) et vérifier les interactions avec les mocks.

**Exercice :**
1. Utilisez le fichier `tests/Controller/ContactControllerTest.php` existant ou créez-en un nouveau.
2. Créez une méthode `testShow()` qui :
   - Crée un client HTTP.
   - Mocke `App\Repository\ContactRepository`.
   - Configure le mock pour que la méthode `find()` soit appelée **exactement une fois** avec l'argument `42` (ou n'importe quel ID de votre choix) et qu'elle retourne un objet `Contact` fictif.
   - Injecte ce mock dans le conteneur :
     ```php
     self::getContainer()->set(ContactRepository::class, $contactRepositoryMock);
     ```
   - Envoie une requête GET sur `/contacts/42`.
   - Vérifie que la réponse est un succès.
   - Vérifie que les informations du contact fictif sont présentes dans la page.

---

## 4. ApiTestCase

**Objectif :** Tester une API REST (souvent avec API Platform).

**Exercice :**
1. Générez un test de type `ApiTestCase` (nécessite `api-platform/symfony`) :
   ```bash
   bin/console make:test ApiTestCase ContactApiTest
   ```
2. Créez une méthode `testCreateContact()` :
   - Utilisez le client API (`static::createClient()`).
   - Envoyez une requête POST sur `/api/contacts` avec un JSON contenant `firstname`, `lastname`, etc.
   - Vérifiez que le code de statut est 201 (Created).
   - Vérifiez que le format de la réponse est `application/ld+json`.
   - Vérifiez que le JSON de retour contient bien les données envoyées.

---

## 5. Tests de Formulaire

**Objectif :** Tester la logique de traitement d'un formulaire sans passer par une requête HTTP complète.

**Documentation de référence :** [Symfony Form Unit Testing](https://symfony.com/doc/current/form/unit_testing.html)

**Exercice :**
1. Créez un test unitaire pour `CompanyType`. Comme `make:test` ne propose pas de template spécifique pour les formulaires, héritez de `Symfony\Component\Form\Test\TypeTestCase`.
2. Créez une méthode `testSubmitValidData()` :
   - Préparez un tableau de données `$formData` (nom, ville).
   - Créez une instance de l'entité `Company` qui devrait être le résultat.
   - Utilisez `$this->factory->create(CompanyType::class, $model)` pour créer le formulaire.
   - Soumettez les données : `$form->submit($formData)`.
   - Vérifiez que `$form->isSynchronized()` est vrai.
   - Vérifiez que l'objet `$model` a été correctement hydraté avec les données du formulaire.
   - Vérifiez la structure des vues : `$view = $form->createView();`.
