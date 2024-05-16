# YpreyPHP

![yprey](https://i.imgur.com/zHoDJG9_d.webp?maxwidth=760&fidelity=grand)

**Backend created by [Fernando Mengali](https://www.linkedin.com/in/fernando-mengali-273504142/)**

YpreyPHP is an Web Application framework with vulnerabilities from the OWASP TOP 10. The framework was developed for teaching and learning details in Pentest (penetration testing) and Application Security. In the context of Offensive Security, vulnerabilities contained in web applicaton can be identified, exploited and compromised. For application security professionals and specifics, the framework provides an in-depth understanding of code-level vulnerabilities. Currently, Yrprey is one of the frameworks with the highest number of vulnerabilities in the world, making it valuable for educational, learning and teaching purposes in the Information Security area. For more information about the vulnerabilities, we recommend exploring the details available at [yrprey.com](https://yrprey.com).

#### Features
 - Based on OWASP's top 10 vulnerabilities for Web Application.

Initially, an unregistered user has access to minimal information about the framework such as the Landing Page. When registering, the user can log in, thus obtaining a token that will be used to purchase products. Features include buying tools, cartoon character, post messages on guestbook etc. The framework was built based on vulnerabilities and is not recommended to be used for business and service sales.

#### List of Vulnerabilities

In this section, we have a comparison of the vulnerabilities present in the framework with the routes and a comparison between the OWASP TOP 10 Web Application.
This table makes it easier to understand how to exploit vulnerabilities in each systemic function.
In the last two columns we have a parenthesis and the scenario associated with the OWASP TOP 10 Web Applications, facilitating the understanding of the theory described on the page https://owasp.org/www-project-top-ten/.
After understanding the scenario and the vulnerable route, the process of identifying and exploiting vulnerabilities becomes easier. If you are an Application Security professional, knowing the scenario and routes of endpoints makes the process of identifying and correcting vulnerabilities easier with manual Code Review Security techniques or automated SAST, SCA and DAST analyses

Complete table with points vulnerables, vulnerability details and a comparison between OWASP TOP 10 Web Application vulnerabilities:

| **Qtde**  | **Method**|            **Path**            |             **Details**                      |
|:---------:|:---------:|:------------------------------:|:--------------------------------------------:|
|    01     |    GET    |  /search.php                   |            MySQL Injection                   |
|    02     |    GET    |  /search.php                   |  Cross-site scripting - Reflect (RXSS)       |
|    03     |    GET    |  /tools.php?id={numer_id}      |            MySQL Injection                   |
|    04     |    GET    |  /warriors.php?id={numer_id}   |            MySQL Injection                   |
|    05     |    POST   |  /guestbook.php                |    Cross-site scripting - Stored (XSS)       |
|    06     |    POST   |  /login.php                    |          MySQL Injection (' or 1=1#)         |
|    07     |    GET    |  /change.php?password={string} |      Cross-site request forgery (CSRF)       |
|    08     |    GET    |  /profile.php?id={string}      |           Web Parameter Tampering            |
|    09     |    N/A    |  /index.php                    |  Session Hijacking (Manipulation Cookie)     |
|    10     |    GET    |  /phpinfo.php                  |            Misconfiguration                  |
|    11     |    GET    |  /js/jquery-1.5.1.js           |  Cross-site scripting - Reflect (RXSS)       |
|    12     |    GET    |  /js/jquery-1.5.1.js           |           Prototype Pollution                |
|    13     |    GET    |  /js/lodash-3.9.0.js           |           Prototype Pollution                |
|    14     |    GET    |  /js/lodash-3.9.0.js           |            Command Injection                 |
|    15     |    GET    |  /js/lodash-3.9.0.js           | Regular Expression Denial of Service (ReDoS) |
|    16     |    GET    |  /js/bootstrap-4.1.3.js        |           Prototype Pollution                |
|    17     |    GET    |  /WS_FTP.LOG                   |            Misconfiguration                  |
|    18     |    GET    |  /register.php                 |      Remote Command Execution - (RCE)        |

## How Install

- 1º - Install and configure Apache, PHP and MySQL on your Linux.
- 2º - Import the YRpreyPHP files to /var/www/
- 3º - Create a database named "yrprey".
- 4º - Import the yrprey.sql into the database.
- 5º - Access the address http://localhost in your browser.

## Observation
You can test on Xampp or any other platform that supports PHP and MySQL.

## Reporting Vulnerabilities

Please, avoid taking this action and requesting a CVE!

The application intentionally has some vulnerabilities, most of them are known and are treated as lessons learned. Others, in turn, are more "hidden" and can be discovered on your own. If you have a genuine desire to demonstrate your skills in finding these extra elements, we suggest you share your experience on a blog or create a video. There are certainly people interested in learning about these nuances and how you identified them. By sending us the link, we may even consider including it in our references.
