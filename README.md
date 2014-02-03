# CakePHP Environment Plugn

The configuration switching library by filebase.

Copyright 2014, ELASTIC Consultants Inc. ([http://elasticconsultants.com](http://elasticconsultants.com))

[![Build Status](https://travis-ci.org/nojimage/cakephp-environment.png?branch=master)](https://travis-ci.org/nojimage/cakephp-environment)

## Installation

git clone

    git clone http://github.com/nojimage/cakephp-environment app/Plugin/Environment

or use composer

    composer require nojimage/cakephp-environment:dev-master


## How to Setup

### 1. Create env file dir

Create `app/Config/env` direcotry.

    mkdir app/Config/env

### 2. Create each environments configuration files

Create dirs

    mkdir app/Config/development app/Config/staging app/Config/production

and create each environments bootstrap file.

    vi app/Config/development/bootstrap.php
    vi app/Config/staging/bootstrap.php
    vi app/Config/production/bootstrap.php

### 3. Setup APP/Config/bootstrap.php

in bootstrap.php 

    CakePlugin::load('Environment');
    App::uses('Environment', 'Environment.Lib');
    Environment::load(); // check env and loading each env bootstrap.php

### How to switching environment

Create file in `env` dir.

switch to development:

    rm app/Config/env/* && touch app/Config/env/development

switch to production:

    rm app/Config/env/* && touch app/Config/env/production


## Usage

Please see [Wiki](https://github.com/nojimage/cakephp-environment/wiki) pages.

## License

Licensed under The MIT License.
Redistributions of files must retain the above copyright notice.


Copyright 2014, ELASTIC Consultants Inc. (http://elasticconsultants.com)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

