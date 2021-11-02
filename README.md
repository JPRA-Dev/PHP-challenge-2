# COGIP

### Description:

The COGIP project is a request from a client to create a web application for the administrative management of the company. This software will provide access to the company's database according to the status of the person connected. 

### Page Heroku:

https://becode-cogip.adrienlenoir.be/

### Feature:

They will therefore be able to view pages:

 * Welcome page: 
      * With the list of the last 5 invoices, ordered by date.
      * With the list of the last 5 people encoded in the database.
      * With the list of the last 5 companies encoded in the database.
      
 * Companies page:
      * With the list of all companies in alphabetical order. The name of companywill be a link to a new page containing its details.
      
 * Invoices page:
      * With the list of all the invoices from the most recent to the oldest. Each invoice number will be a link to a new page containing its details.

 * Contacts page:
      * With the list of all the contacts in alphabetical order. Each contact name will be a link to a new page containing its details.
      
 * Providers page: 
      * With the list of all providers in alphabetical order. The name of the provider will be a link to a new page containing its details.

 * Clients page:
      * With the list of all the clients in alphabetical order. Each client name will be a link to a new page containing its details.

 * Company details page:
      * With the Name and VAT number of the company, list of invoices linked to the company and list of contacts working for it.
      
 * Invoice details page:
      * With number, date, company, type of company and the contact linked to the invoice.

 * Contact details page:
      * With first and last name, email, name of the company where the person works and the list of all invoices linked to that person.

There must also be a custom message on the welcome page depending who is connected.
If the user as god mode access he will also have access to a button to manage the users.
If the user as moderator access he will access to the admin dashboard. There he can add invoices, companies and people but can't either modify or delete elements from the database.


### Mokup / Sources:

https://www.figma.com/file/wgyPPEJv7mvqFdMgkdkytd/COGIP-App-(Copy)?node-id=0%3A1

### Team / work division:

- _Adrien Lenoir_: [GitHub](https://github.com/AdrienLenoir)
    * Project manager: 
        - project initialization
        - Creation and administration of the repository
        - Creation of the structure of the VS code
        - Creation of the controllers
        - Creation of the routers
        - Creation of the helpers
        - Creation of the models
        - Gestion of the errors and debugs

- _Elsa Magalhaes_: [GitHub](https://github.com/Magael)
    * Assistant manager:
        - Creation of the database and management of PHP Myadmin
        - Creation of the PHP code with collaboration of project manager
        - Creation of the clients page and providers page
        - Creation of form
       
- _Julie Metz_: [GitHub](https://github.com/juju2307)
    * Assistant manager:
        - Creation of the mokup
        - Creation of the HTML and SCSS code for all pages
        - Creation responsive web
        - Readme
       
- _Joao Andrade_: [GitHub](https://github.com/JPRA-Dev)
    * Assistant manager:
        - Creation of the HTML, SCSS, PHP and JS of the Header and the Footer
        - Help in passing the CSS of the website to SCSS
        - Creation of the responsive web of the Header and the Footer
        - Creation of the PHP code with collaboration of project manager
        - PHP validation and sanitize
        
- (_Emerson Vandeputte_: [GitHub](https://github.com/hallomoto-beta))
   * Public relations:
        - links to connect the pages
        




