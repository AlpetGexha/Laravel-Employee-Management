# Employee-Management

![EM](https://user-images.githubusercontent.com/50520333/199846282-977d19d7-d600-4911-a43f-a3b59fc1de9e.PNG)

# Installation

#### Update composer

```
composer update
cp .env.example .env
php artisan migrate:fresh --seed
php artisan shield:install
```

```
Email: admin@admin.com
PW   : admin
```

End Point employees API
`URL/api/employees`

LARAVEL-EMPLOYEE-MANAGEMENT
===========================

_Empower Your Workforce, Streamline Employee Management Effortlessly_

* * *

Table of Contents
-----------------

* [Overview](#overview)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
  * [Usage](#usage)
  * [Testing](#testing)

* * *

Overview
--------

**Laravel-Employee-Management** is a powerful tool designed to simplify and enhance employee management for organizations of all sizes.

**Why Laravel-Employee-Management?**

This project streamlines HR processes by managing employee data, attendance, and payroll in one place. The core features include:

* **📊 Comprehensive Employee Management:** Streamlines HR processes by managing employee data, attendance, and payroll in one place.
* **🎨 Modern UI with Tailwind CSS:** Provides a responsive and visually appealing interface, enhancing user experience.
* **🔔 Real-time Notifications:** Keeps users informed with instant updates, improving engagement and responsiveness.
* **🧪 Robust Testing Framework:** Ensures high code quality through automated testing, reducing bugs and improving reliability.
* **🏢 Multi-Tenancy Support:** Allows multiple companies to use the application securely, enhancing scalability and flexibility.

* * *

Getting Started
---------------

### Prerequisites

This project requires the following dependencies:

* **Programming Language:** PHP
* **Package Manager:** Composer, Npm

### Installation

Build Laravel-Employee-Management from the source and intsall dependencies:

1. **Clone the repository:**

        ❯ git clone https://github.com/AlpetGexha/Laravel-Employee-Management
        

2. **Navigate to the project directory:**

        ❯ cd Laravel-Employee-Management
        

3. **Install the dependencies:**

**Using [composer](https://www.php.net/):**

    ❯ composer install
    

**Using [npm](https://www.npmjs.com/):**

    ❯ npm install
    

### Usage

Run the project with:

**Using [composer](https://www.php.net/):**

    php {entrypoint}
    

**Using [npm](https://www.npmjs.com/):**

    npm start
    

### Testing

Laravel-employee-management uses the {**test\_framework**} test framework. Run the test suite with:

**Using [composer](https://www.php.net/):**

    vendor/bin/phpunit
    

**Using [npm](https://www.npmjs.com/):**

    npm test
    

* * *

[⬆ Return](#top)

* * *
