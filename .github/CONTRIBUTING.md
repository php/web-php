# CONTRIBUTING

Anybody who programs in PHP can be a contributing member of the community that
develops and deploys www.php.net; the task of deploying the www.php.net website is a never-ending one.

You don't need any special access to download, debug and begin submitting
code, tests or documentation. 

## Index

* [Pull requests](#pull-requests)
* [Filing bugs](#filing-bugs)
* [Feature requests](#feature-requests)
* [Writing tests](#writing-tests)
* [Getting help](#getting-help)
* [Checklist for submitting contribution](#checklist-for-submitting-contribution)
* [What happens after submitting contribution?](#what-happens-after-submitting-contribution)
* [What happens when your contribution is applied?](#what-happens-when-your-contribution-is-applied)
* [Git commit rules](#git-commit-rules)

## Pull requests

www.php.net welcomes pull requests to [add tests](#writing-tests), fix bugs and to
implement features. Please be sure to include tests as appropriate!

If your pull request exhibits conflicts with the base branch, please resolve
them by using `git rebase` instead of `git merge`.

Fork the official www.php.net repository and send a pull request. A notification will be
sent to the pull request mailing list. Sending a note to [PHP php.net internal infrastructure discussion](mailto:php-webmaster@lists.php.net) may help getting more feedback and quicker turnaround.

## Filing bugs

Bugs can be filed on [GitHub Issues](https://github.com/php/web-php/issues).

Where possible, please include a self-contained reproduction case!

## Feature requests

Feature requests can be filed on [GitHub Issues](https://github.com/php/web-php/issues).

## Writing tests

We love getting new tests! www.php.net is a fairly old project and improving test coverage is
a huge win for every www.php.net user.

[Our QA site includes a page detailing how to write test cases.](https://qa.php.net/write-test.php)

Submitting test scripts helps us to understand what functionality has changed.
It is important for the stability and maintainability of www.php.net that tests are
comprehensive.

## Getting help

If you are having trouble contributing to www.php.net, or just want to talk to a human
about what you're working on, you can contact us via the
[PHP php.net internal infrastructure discussion](mailto:php-webmaster@lists.php.net).

## Checklist for submitting contribution

- Update git source just before running your final `diff` and before testing.
- Create test scripts.
- Run

  ```
  make tests
  ```

  to check your change doesn't break other features.
- Run

  ```
  make coding-standards
  ```

  to automatically fix coding standard issues.
- Review the change once more just before submitting it.

## What happens after submitting contribution?

If your change is easy to review and obviously has no side-effects, it might be
committed relatively quickly.

Because www.php.net is a volunteer-driven effort, more complex changes will require
patience on your side. If you do not receive feedback in a few days, consider
bumping. Before doing this think about these questions:

- Did I send the patch to the right mailing list?
- Did I review the mailing list archives to see if these kind of changes had
  been discussed before?
- Did I explain my change clearly?
- Is my change too hard to review? If so, why?

## What happens when your contribution is applied?

Your name will likely be included in the Git commit log. 

## Git commit rules

This section refers to contributors that have Git push access and make commit
changes themselves. We'll assume you're basically familiar with Git, but feel
free to post your questions on the mailing list. Please have a look at the more
detailed [information on Git](https://git-scm.com/).

www.php.net is developed through the efforts of a large number of people. Collaboration
is a Good Thing(tm), and Git lets us do this. Thus, following some basic rules
with regards to Git usage will:

- Make everybody happier, especially those responsible for maintaining the website.
- Keep the changes consistently well documented and easily trackable.
- Prevent some of those 'Oops' moments.
- Increase the general level of good will on planet Earth.

Having said that, here are the organizational rules:

1. Respect other people working on the project.

2. Discuss any significant changes on the list before committing.

3. If you "strongly disagree" about something another person did, don't start
   fighting publicly - take it up in private email.

4. If you don't know how to do something, ask first!

5. Test your changes before committing them. We mean it. Really. To do so use

   ```
   make tests
   ```

5. Fix coding standard issues before committing code. To do so use

   ```
   make coding-standards
   ```

6. Use reasonable commit messages.

Thank you for contributing to https://www.php.net!
