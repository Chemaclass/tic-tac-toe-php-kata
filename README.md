# PHP Scaffolding

[![MIT Software License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

This is a scaffolding for PHP projects. A basic structure ready to start coding in `src` and `tests`.

### Some composer scripts

```bash
composer test-all     # run test-quality & test-phpunit
composer test-quality # run csrun & psalm & phpstan
composer test-phpunit # run phpunit

composer csrun   # check code style
composer psalm   # run psalm coverage
composer phpstan # run phpstan coverage
```

### Git hooks

Install the pre-commit hook running:

```bash
./tools/git-hooks/init.sh
```

### Basic Dockerfile

If you don't have PHP in your local machine, you can use docker to build an image with `PHP 8.0`.

```bash
docker build -t tic-tac-toe-php-kata .
```

### Contributions

Feel free to open any PR with your ideas, suggestions or improvements.

Or contact me directly via [Twitter](https://twitter.com/Chemaclass).


# Rules
In random order

* a game is over when all fields in a row are taken by a player
* players take turns taking fields until the game is over
* a game is over when all fields in a diagonal are taken by a player
* a game is over when all fields are taken
* there are two players in the game (X and O)
* a game has nine fields in a 3x3 grid
* a game is over when all fields in a column are taken by a player
* a player can take a field if not already taken



# TODO
- [ ] Implement the total of turns played
- [ ] Implement the logic to switch the player from the current to the other.
- [ ] Implement the draw logic
- [ ] Test the winning game use cases (both players)
- [ ] Create the graphical representation of the game
