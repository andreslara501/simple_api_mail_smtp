# Simple Api Mail Smtp
Simple Api Mail Smtp is a PHP script to send e-mails
Return the states in Json and receive data in Json

## Usage
Send query using POST Method with this structure

```json
{
	"to" : [
		{
			"name" : "Andres Lara",
			"email": "andres@gmail.com"
		},
		{
			"name":"Other Andres Lara Mail",
			"email": "andres.lara@gmail.com"
		}
],
	"subject" : "Test mail ;) ",
	"message" : "Hi, how r u?, bye!!!!"
}
```
## Json returned
  - Status 0, error in server or configuration
  - Status 1, message successfully sent
  - Status 2, validation error, 'to' input empty
  
### Example

```json
{
  "status": 2,
  "response": "'To' input can't be empty"
}
```

```json
{
  "status": 0,
  "response": " authentication failure [SMTP: Invalid response code received from server (code: 535, response: 5.7.3 Authentication unsuccessful [BN6PR06CA0021.namprd06.prod.outlook.com])]"
}
```

```json
{
  "status": 1,
  "response": "Message successfully sent!"
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
