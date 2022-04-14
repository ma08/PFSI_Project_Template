# Setup of Server and Database
- Get EC2 VM running using the template
- Use http://\<Public IP Address\>/phpmyadmin/ to access SQL database portal
  - Username: root
  - Password: root
  - Use "test" database which is already created by default
  - Run the following query customized to your requirements: 
    ```
    CREATE TABLE users(
        user_id varchar(255),
        first_name varchar(255),
        last_name varchar(255),
        password varchar(255),
        address varchar(255)
    );
    ```
- For filezilla you use:
  - IP
  - username: studentuser
  - password: studentuser 
  - port 22

### [Use Bootstrap Components](https://getbootstrap.com/2.3.2/components.html)

### [Connecting Domain to AWS](https://courseworks2.columbia.edu/courses/143207/discussion_topics/829433)
### [Tutorial Video](https://www.youtube.com/watch?v=2RFAKqJ1xWE)
