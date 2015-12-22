# Server

Serveur de l'application Find Yours Pets.

## Spécifications techniques
- Serveur PHP
- Base de données MySQL
- Echange de données via JSON

## Protocole d'échange
- url : http://domaine.com/index.php

### User

- [x] Login
  - paramètres :  page = login, nickname, password
  - forme réponse : {'success' => [true]/[false], 'isAdmin' => [true]/[false]}

- [x] Register
  - paramètres : page = register, nickname, password1, password2, mail, phone, firstname, lastname
  - forme réponse : {'success' => [true] / [false], 'error' => 'message erreur'}

- [x] GetUsers
  - paramètres : page = getUsers
  - forme réponse : {'nickname1' => User, 'nickname2' => User, ...}

- [x] UpdateUserProfile
  - paramètres : page = updateUserProfile, nickname, newPassword, confirmNewPassword, newMail, newPhone, newFirstname, newLastname
  - forme réponse : {'success' => [true]/[false], 'error' => 'message erreur'}

- [x] DeleteUser
  - paramètres : page = deleteUser, nickname
  - forme réponse : {'success' => [true]/[false]}

- [x] GetUserInformations
  - paramètres : page = getUserInformations, nickname
  - forme réponse : {'success' => [true]/[false] ,'idUser' => User, 'error' => 'message erreur'}

- [x] GetUsersAnimals
  - paramètres : page = getUsersAnimals, nickname
  - forme réponse : {'idAnimal1' => Animal, 'idAnimal2' => Animal, ...}

- [x] IsFollowingAnimal
  - paramètres : page = isFollowingAnimal, nickname, idAnimal
  - forme réponse : {'following' => [true]/[false]}

- [x] FollowAnimal
  - paramètres : page = followAnimal, nickname, idAnimal
  - forme réponse : {'success' => [true]/[false], 'error' => 'message erreur'}

- [x] UnfollowAnimal
  - paramètres : page = unfollowAnimal, nickname, idAnimal
  - forme réponse : {'success' => [true]/[false]}

- [x] FollowShelter
  - paramètres : page = followShelter, nickname, idShelter
  - forme réponse : {'success' => [true]/[false], 'error' => 'messages erreur'}

- [ ] IsFollowingShelter
  - paramètres : page = isFollowingShelter, nickname, idShelter
  - forme réponse : {'following' => [true]/[false]}

- [ ] UnfollowShelter
  - paramètres : page = unfollowShelter, nickname, idShelter
  - forme réponse : {'success' => [true]/[false]}

- [x] IsAdministrator
  - paramètres : page = isAdministrator, nickname
  - forme réponse : {'admin' => [true]/[false]}

- [x] GetAnimalsFollowedByUser
  - paramètres : page = getAnimalsFollowedByUser, nickname
  - forme réponse : {'idAnimal1' => Animal, 'idAnimal2' => Animal, ...}

- [x] GetSheltersFollowedByUser
  - paramètres : page = getSheltersFollowedByUser, nickname
  - forme réponse : {'idShelter1' => Shelter, 'idShelter2' => Shelter, ...}

- [x] IsUserAnimalsOwner
  - paramètres : page = isUserAnimalsOwner, idAnimal, nickname
  - forme réponse : {'owner' => [true] / [false]}

- [x] GetUserPetsPreferences
  - paramètres : page = getUserPetsPreferences, nickname
  - forme réponse : {'catsFriend' => catsFriend, 'dogsFriend' => dogsFriend, 'childrenFriend' => childrenFriend}

- [x] SetUserPetsPreferences
  - paramètres : page = setUserPetsPreferences, nickname, catsFriend, dogsFriend, childrenFriend
  - forme réponse : {'success' => [true]/[false]}


### Shelters

- [x] GiveOpinionAboutShelter
  - paramètres : page = giveOpinionAboutShelter, idShelter, nickname, stars, description
  - forme réponse : {'success' => [true]/[false], 'error' => 'message erreur'}

- [x] GetOpinionsAboutShelter
  - paramètres : page = getOpinionsAboutShelter, idShelter
  - forme réponse : {'idOpinion1' => Opinion, 'idOpinion2' => Opinion, ...}

- [x] GetAllShelters
  - paramètres : page = getAllShelters
  - forme réponse : {'idShelter1' => Shelter, 'idShelter2' => Shelter, ...}

- [x] AddShelter
  - paramètres : page = addShelter, name, phone, description, mail, website,operationalHours, street, zipcode, city, latitude, longitude
  - forme réponse : {'success' => [true]/[false]}

- [x] GetShelter
  - paramètres : page = getShelter, idShelter
  - forme réponse : {'idShelter' => Shelter}

- [x] GetSheltersAnimals
  - paramètres : page = getSheltersAnimals, idShelter, nickname
  - forme réponse : {'idAnimal1' => Animal, 'idAnimal2' => Animal, ...}

- [x] GetSheltersAdoptedAnimals
  - paramètres : page = getSheltersAdoptedAnimals, idShelter, nickname
  - forme réponse : {'idAnimal1' => Animal, 'idAnimal2' => Animal, ...}

- [x] AddAnimalInShelter
  - paramètres : page = addAnimalInShelter, idShelter, type, name, breed, age, gender, catsFriend, dogsFriend, childrenFriend, description
  - forme réponse : {'success' => [true]/[false], 'error' => 'message erreur'}

- [x] IsShelterAdministrator
  - paramètres : page = isShelterAdministrator, idShelter, nickname
  - forme réponse : {'admin' => [true]/[false]}

- [x] IsShelterManager
  - paramètres : page = isShelterManager, idShelter, nickname
  - forme réponse : {'manager' => [true]/[false]}

- [x] AddShelterAdministrator
  - paramètres : page = addShelterAdministrator, idShelter, nickname
  - forme réponse : {'success' => [true]/[false]}

- [x] AddShelterManager
  - paramètres : page = AddShelterManager, idShelter, nickname
  - forme réponse : {'success' => [true]/[false]}


### Animals

- [x] GetHomelessAnimals
  - paramètres : page = getHomelessAnimals, nickname, [catsFriend], [dogsFriend], [childrenFriend]
  - forme réponse : {'idAnimal1' => Animal, 'idAnimal2' => Animal, ...}

- [x] GetAnimal
  - paramètres : page = getAnimal, idAnimal, nickname
  - forme réponse : {'idAnimal' => Animal }

- [x] ChangeAnimalsStatus
  - paramètres : page = changeAnimalsStatus, idAnimal, newStatus
  - forme réponse : {'success' => [true]/[false]}

- [x] GetNewsFromAnimal
  - paramètres : page = getNewsFromAnimal, idAnimal
  - forme réponse : {'idNew1' => New, 'idNew2' => New, ...}

- [x] AddAnimalsNews
  - paramètres : page = addAnimalsNews, idAnimal, description
  - forme réponse : {'success' => [true]/[false], 'error' => 'message erreur'}

- [x] GetLastNewsFromAnimal
  - paramètres : page = getLastNewsFromAnimal, idAnimal
  - forme réponse : {'news' => News}

- [x] GetAnimalsOwner
  - paramètres : page = getAnimalsOwner, idAnimal
  - forme réponse : {'nickname' => ['nickname owner']/[false]}

- [ ] GetUsersInterestedByAnimal
  - paramètres : getUsersInterestedByAnimal, idAnimal
  - forme réponse : {'nickname1' => User, 'nickname2' => User, ...}

- [ ] GetMessagesAboutAnimal
  - paramètres : getMessagesAboutAnimal, idAnimal
  - forme réponse : {'idMessage1' => Message, 'idMessage2' => message, ...}

- [x] SendMessageAboutAnimal
  - paramètres : sendMessageAboutAnimal, idAnimal, nickname, content
  - forme réponse : {'success' => [true]/[false], 'error' => 'message erreur'}

- [x] UserIsInterestedOnAnimal
  - paramètres : userIsInterestedOnAnimal, nickname, idAnimal
  - forme réponse : {'success' => [true]/[false], 'error' => 'message erreur'}

- [x] UserIsNotInterestedOnAnimal
  - paramètres : userIsNotInterestedOnAnimal, nickname, idAnimal
  - forme réponse : {'success' => [true]/[false], 'error' => 'message erreur'}
