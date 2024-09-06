# Symfony Command Project

This Symfony project contains a custom command designed to 
show data from the database previously proccesed by the ETL.

Follow the instructions below to install, configure, and use the command.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- PHP 8.2 or higher
- Symfony 7.1
- Composer
- Symfony CLI (optional, but recommended)

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/jahm89/telust-test-frontend-2024
   cd your-project
   ```

2. **Install Dependencies**
    ```bash
    composer install
   ```

3. **Create the Google credentials**
  - Go to your project on Google cloud console and select 'APIs & Services'.
  - On the credentials tab you can select 'create credentials' and then 'OAuth client ID'.
  - In the next screen choose 'Web application' as application type.
  - Add http://localhost:8000/login/check-google(or change the URL as you neeed) to 'Authorized redirect URIs' and click 'create'
  - Then you're gonna get a google ID and google secret for the .env file


4. **Set Up Environment Variables, Create .env file and add:**
    
    - DATABASE_URL=mysql://USER:PASSWORD@HOST:PORT/telus_test?serverVersion=5.7.44&charset=utf8mb4
    - GOOGLE_ID=
    - GOOGLE_SECRET=

4. **Create the database**  
    Run the db.sql script

5. **Run the command**  
    You can run the local server: 

    ```
        symfony server:start
    ```

Then access to your local URL.
