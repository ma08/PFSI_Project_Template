# Setup of Server and Database
- [SQL PHP Tutorial Video](https://www.youtube.com/watch?v=2RFAKqJ1xWE)
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

### Domain Name Setup with AWS
- [Tutorial Video](https://youtu.be/0JY8KnwPMY0)
- [AWS guide](https://docs.aws.amazon.com/Route53/latest/DeveloperGuide/migrate-dns-domain-inactive.html)
  - Create Hosted Zone in AWS with its name as your domain name (from netfirms)
  - [Routing traffic to EC2](https://docs.aws.amazon.com/Route53/latest/DeveloperGuide/routing-to-ec2-instance.html)
    - As shown in the above link, create A record with `www.<domain name>` as record name. (You only need to fill `www` in the form) with the Public IP of your EC2 instance as `Value`. All other entries can be default values.
    - Wait for the record to get updated, you can see the status after you add the record.
- [Netfirms guide](https://www.netfirms.com/help/article/domain-management-how-to-update-nameservers)
  - Add the nameservers (NS records) from your AWS public hosted zone to netfirms nameservers and remove existing ones. 
- Test by accessing `www.<domain name>`. The `www` is critical.
- If not working try deleting the old `NS` records in the `DNS records` part in netfirms as well.

### [Use Bootstrap Components](https://getbootstrap.com/2.3.2/components.html)

