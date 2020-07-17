# Simple Api Mail Smtp
Simple Api Mail Smtp is a PHP script to send e-mails

## Usage
Send query using POST Method with this structure

```json
{
	"to" 			: [
		{
			"name" : "Andres Lara",
			"email": "andres@gmail.com"
		},
		{
			"name":"Other Andres Lara Mail",
			"email": "andres.lara@gmail.com"
		}
],
	"subject"	: "Test mail ;) ",
	"message" : "Hi, how r u?, bye!!!!"
}
```


## Configure
Use the SMTP configuration of your favorite server, example:

  - GMAIL: smtp.gmail.com
  - Office 365 (Outlook): smtp.office365.com

```php  
const MAIL_FROM             = 'Name mail from <nick@mail.com>';
const SMTP_SERVER_HOST      = 'smtp.office365.com'; // or whatever server SMTP
const SMTP_SERVER_USER      = 'nick@mail.com';
const SMTP_SERVER_PASSWORD  = '';
```
