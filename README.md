<H1><p align="center">Aspire Mini</p></H1>


<h3> Setup Instruction </h3>
1: run <code>composer install </code>

2: run <code>sudo chmod -R 777 storage</code>

3: run <code>php artisan migrate:fresh --seed</code>

4: run <code>php artisan test</code>

this code will run test for

- Loan Request
- Loan Approval
- Loan Repayment

5: For Hosting the Application run <code>php artisan serve</code>

6: Visit http://127.0.0.1:8000
and login using
<h4><b>Customer Account</b>  (for requesting loans)<h4>
<code>Username : customer@example.com</code>

<code>Password : password</code>

<h4><b>Administrator Account</b> (for approving loans)<h4>
<code>Username : admin@example.com</code>

<code>Password : password</code>
