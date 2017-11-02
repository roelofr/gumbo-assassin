# Gumbo Millennium Assassin

Play Gotcha over long distances, sign up using your OAuth2 account from any
provider and let the computer automatically select your enemies.

The web-app is supposed to control players in a larger game of Assasin, where
there are certain "restricted zones" where tagging is not allowed. We'll most
likely be using it for our yearly Landhuisweekend, where the student community
goes to a villa for a weekend, causing a lot of close proximity and generally
making the game more fun.

More information about Assassin can be [found on Wikipedia][wiki]

[wiki]: https://en.wikipedia.org/wiki/Assassin_(game)

## License

As this is a project by and for students and the associated community, and
since we'd love to let others improve upon the app, the software is licensed
under the [GNU Affero General Public License Version 3][license], as attached
in the [LICENSE.md file][license].

[license]: LICENSE.md

## Terminology

For this project we use the following terms:

- **App** or **Application** - The Gumbo Millennium Gotcha web-app.
- **User** - A user that has logged in using their OAuth2 link
- **Game** - A single game of Assassin
- **Player** - A user that's actively taking part in a Game
- **Target** - A user that the Player has to take out, using the means
 instructed by the Referee(s).
- **Referee(s)** - A User that created the game, they control the game and can
at all times see which player has to target another player.
- **Kill** - A kill with a weapon, as per the Game's rules.

## Purpose of the application

The application's only purpose is instructing Players who their target is, and
passing on the 'flame' when someone is killed. It does *not* support respawns
and doesn't impose any restrictions.

When a hit is performed, the app will request the GPS location of the user and
the target, to allow the referee to judge if the hit was legitimate.

We won't enforce any rules, that's where the referees come in.

## Requirements

The application has the following requirements:

1. Allow users to sign up with their OAuth2 provider
2. Allow users to enroll in an Assassin game
3. Allow users to 'hit' their targets
4. Allow users to mark themselves as hit, removing them from the game.
4. Prevent fraud by reporting all hits to referees, allowing them to decline
   the hit if they deem that required. Hits are auto-approved after 6 hrs.

## Development

### Getting started

To get started on working with the application, do the following:

1. Install the following packages:
  - [PHP 7.1+][php],
  - [Composer][composer],
  - [Docker][docker],
  - [Docker Compose][docker-compose] (Only for Linux, Docker compose comes packaged with the Mac and Windows install),
  - [NodeJs][nodejs] and
  - [Yarn][yarn] (optional, but very highly recommended).
1. Run these commands, in order:
  1. `docker-compose up -d mysql redis` (To start a MariaDB server at `127.13.37.1:3306`)
  2. `composer install` (To install all PHP dependencies and configure [Laravel][laravel])
  3. `yarn install` (To install all Node dependencies)
  4. `yarn build` (To build the Javascript and Sass files)
  1. `docker-compose up -d laravel` (To start Laravel in a docker container)
1. Go to [`http://127.13.37.1:8000`][laravel-server] and try out the app.

[php]: https://php.net
[composer]: https://getcomposer.org
[docker]: https://docker.com
[docker-compose]: https://docs.docker.com/compose/install/
[nodejs]: https://nodejs.org/en/download/
[yarn]: https://yarnpkg.com/en/docs/install
[laravel]: https://laravel.com/
[laravel-server]: http://127.13.37.1:8000

### Timeline

- October 9, 2017 - Development started
- November 2, 2017 - Added React, first API outline, docker containers
