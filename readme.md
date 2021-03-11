# JWD Task Batch 2

[![Build Status](https://travis-ci.org/dwyl/esta.svg?branch=master)](https://github.com/handokoadjipangestu/project-task-jwd-150221)
[![stability-experimental](https://img.shields.io/badge/stability-experimental-orange.svg)](https://github.com/handokoadjipangestu/project-task-jwd-150221)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/handokoadjipangestu/project-task-jwd-150221/fork)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This project is intended to fulfill the task of JWD BPPTIK batch 2 in March 2021.

1 repository consisting of 3 task folders including:

- Tugas1_HandokoAdjiPangestu-instalation
- Tugas2_HandokoAdjiPangestu-logic
- Tugas3_HandokoAdjiPangestu-airport

This project was made using native PHP and for appearance it uses a [Bootstrap 4.\*](https://getbootstrap.com/docs/4.0/getting-started/introduction/) framework with [AdminLTE](https://adminlte.io/) template.

For those who want to contribute, just fork or download as usual!

## Requirements

- PHP >= 5.3.7
- Of course with the internet

## Installation

Just fork or download it from this repository then copy it to htdocs directory.

## Usage example

### Tugas1_HandokoAdjiPangestu-instalation

Only contains a pdf on how to install and download the tools needed for junior web developers.

### Tugas2_HandokoAdjiPangestu-logic

#### 1. Percabangan.php

![Percabangan](http://bebaskripsi.000webhostapp.com/project-task-jwd-150221/Tugas2_HandokoAdjiPangestu-logic-1.png)

#### 2. Perulangan.php

![Percabangan](http://bebaskripsi.000webhostapp.com/project-task-jwd-150221/Tugas2_HandokoAdjiPangestu-logic-2.png)

#### 3. Fungsi, Array, Form.php

![Percabangan](http://bebaskripsi.000webhostapp.com/project-task-jwd-150221/Tugas2_HandokoAdjiPangestu-logic-3.png)

### Tugas3_HandokoAdjiPangestu-airport

![Airport](http://bebaskripsi.000webhostapp.com/project-task-jwd-150221/Tugas3_HandokoAdjiPangestu-airport-dashboard.png)

_For more examples and usage, please contact [Handoko Adji Pangestu](https://www.instagram.com/handokoadjip/)._

## Development setup

In the `Tugas3_HandokoAdjiPangestu-airport` directory change `Flight model` section, in the method store replace the header with your baseUrl.

```sh
header('Location: http://localhost/project-learn/bpptik/project-task-jwd-150221-airport/index.php?pref=flight&page=index');
```

to :

```sh
header('Location: {baseUrl}/index.php?pref=flight&page=index'');
```

## Release History

- 0.0.1
  - Work in progress

## Meta

Handoko Adji Pangestu – [@handokoadjip](https://www.instagram.com/handokoadjip/) – handokoadjipangestu@gmail.com

Distributed under the MIT license. See `LICENSE` for more information.

[https://opensource.org/licenses/MIT](https://opensource.org/licenses/MIT)

## Contributing

1. Fork it (<https://github.com/handokoadjipangestu/project-task-jwd-150221/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request
