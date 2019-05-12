DROP DATABASE IF EXISTS xiaoningzhao;
CREATE DATABASE xiaoningzhao;
USE xiaoningzhao;

CREATE TABLE IF NOT EXISTS userinfo (
  userID varchar(10),
  password varchar(32) NOT NULL,
  first_name varchar(20) NOT NULL,
  last_name varchar(20) NOT NULL,
  email varchar(100) DEFAULT NULL,
  home_address varchar(100) DEFAULT NULL,
  home_phone varchar(15) DEFAULT NULL,
  cellphone varchar(15) DEFAULT NULL,
  PRIMARY KEY (userID)
);


CREATE TABLE IF NOT EXISTS product (
  productID varchar(10),
  productName varchar(50) NOT NULL,
  productDescription text,
  productImage varchar(100),
  price varchar(20),
  PRIMARY KEY (productID)
);

CREATE TABLE IF NOT EXISTS review (
  productID varchar(10),
  review text,
  rating int,
  userID varchar(10),
  timedate timestamp,
  PRIMARY KEY (productID, timedate),
  FOREIGN KEY (productID)
        REFERENCES product (productID)
);

CREATE TABLE IF NOT EXISTS product_access_history (
  productID varchar(10),
  userID varchar(10),
  timedate timestamp,
  PRIMARY KEY (productID, userID, timedate),
  FOREIGN KEY (productID)
        REFERENCES product (productID)
);


INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00001',MD5('000000'),'Xiaoning', 'Zhao', 'admin@xiaoningzhao.c', '123 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00002',MD5('000000'),'Sam', 'L', 'sam@xiaoningzhao.com', NULL, '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00006',MD5('000000'),'user6', 'user6', 'user6@abc.com', '111 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00007',MD5('000000'),'user7', 'user7', 'user7@abc.com', '222 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00008',MD5('000000'),'user8', 'user8', 'user8@abc.com', '333 street, A city, CA', NULL, '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00009',MD5('000000'),'user9', 'user9', 'user9@abc.com', '444 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00010',MD5('000000'),'user10', 'user10', 'user10@abc.com', '555 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00011',MD5('000000'),'user11', 'user11', 'user11@abc.com', '666 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00012',MD5('000000'),'user12', 'user12', 'user12@abc.com', '777 street, A city, CA', NULL, '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00013',MD5('000000'),'user13', 'user13', 'user13@abc.com', '888 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00014',MD5('000000'),'user14', 'user14', 'user14@abc.com', '999 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00015',MD5('000000'),'user15', 'user15', 'user15@abc.com', '1212 street, A city, CA', '555-555-5555', NULL);
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00016',MD5('000000'),'user16', 'user16', 'user16@abc.com', '2323 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00017',MD5('000000'),'user17', 'user17', 'user17@abc.com', '3434 street, A city, CA', '555-555-5555', '555-555-5555');
INSERT INTO  userinfo  (userID, password, first_name, last_name, email, home_address, home_phone, cellphone) VALUES ('00018',MD5('000000'),'user18', 'user18', 'user18@abc.com', '4545 street, A city, CA', '555-555-5555', NULL);

INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00001', 'Business Analysis', 'Business Analysis is the practice of enabling change in an organizational context, by defining needs and recommending solutions that deliver value to stakeholders.', null);
INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00002', 'Business Planning', 'The business planning process is designed to answer two questions: Where are we now? Where do we want to go? The result of this process is a business plan that serves as a guide for management to run the company. Describing the most critical tasks that must be completed and the time frame for completion, a business plan allows companies to allocate resources to accomplish goals.', null);
INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00003', 'Strategy Execution', 'Strategy Execution requires the following activities to be undertaken:							<li>Strategy articulation - Building consensus within the team responsible for delivery of the strategy about the outcomes to be achieved</li>
<li>Strategy validation - Engaging with stakeholders and others to confirm strategic outcomes being pursued are acceptable</li>
<li>Strategy communication - Convert strategic objectives into clear short-term operating objectives that can be assigned to groups for delivery</li>
<li>Strategy monitoring - Monitor the progress of the organisation in delivering the strategic objectives</li>
<li>Strategy engagement - Managerial interventions designed to ensure organisation successfully achieves chosen strategic outcomes</li>', null);
INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00004', 'Sales Management', 'Sales management approach extends from quick targeted interventions that unlock value to more holistic sales transformations focused on architecture, execution, and skill-building opportunities across the clients entire go-to-market model', null);
INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00005', 'Customer Lifecycle Management', 'Customer lifecycle management or CLM is the measurement of multiple customer-related metrics, which, when analyzed for a period of time, indicate performance of a business. The overall scope of the CLM implementation process encompasses all domains or departments of an organization, which generally brings all sources of static and dynamic data, marketing processes, and value added services to a unified decision supporting platform through iterative phases of customer acquisition, retention, cross and up-selling, and lapsed customer win-back.', null);
INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00006', 'Branding', 'Digital technology has loosened control over brand messages by creating new media channels and social networks. Mergers and acquisitions create overlapping brands within brand portfolios. And the relationships between brands and their customers have now become more open-ended as online discussions extend the brand experience after purchase.
To help manage this complexity and power growth through digital advantage, we bring together deep data analysis and broad experience to take the uncertainty out of the branding process and help clients create great brands.', null);
INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00007', 'Digital Marketing', 'Digital marketing engagements are typically multifaceted, solving for specific digital marketing challenges while building ongoing client capabilities. In addition to defining new roles and responsibilities and helping develop employees skills, we address technology infrastructure issues and identify potential partners.', null);
INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00008', 'Strategic IT Planning', 'We approach IT planning from the prospective of using your existing infrastructure as an enabler of your business model.', null);
INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00009', 'Digital Transformation', 'Digital transformation is the profound transformation of business and organizational activities, processes, competencies and models to fully leverage the changes and opportunities of a mix of digital technologies and their accelerating impact across society in a strategic and prioritized way, with present and future shifts in mind.', null);
INSERT INTO  product (productID, productName, productDescription, productImage) VALUES ('00010', 'IT Security', 'Cybersecurity challenges are different for every business in every industry. IT Security helps organizations prepare, protect, detect, respond and recover along all points of the security lifecycle.', null);
