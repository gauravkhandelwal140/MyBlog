-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 10:46 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PHP'),
(2, 'JavaScript'),
(3, 'NodeJS'),
(4, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_des` text NOT NULL,
  `comment_date` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_des`, `comment_date`, `comment_author`, `comment_post_id`) VALUES
(1, 'Nice Post', '24 May 2020', 'Gaurav', 1),
(2, 'Nice Blog..', '24 May 2020', 'Dev Sharma', 1),
(3, 'Nice Blog..', '24 May 2020', 'Dev Sharma', 1),
(4, 'nice', '24 May 2020', 'Gaurav', 1),
(5, 'I love Python', '25 May 2020', 'dev', 5),
(6, 'Nice Work', '25 May 2020', 'Gaurav', 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_des` longtext NOT NULL,
  `post_image` text NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'Published',
  `post_comment` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_des`, `post_image`, `post_date`, `post_author`, `post_cat_id`, `post_status`, `post_comment`) VALUES
(1, 'Should I learn PHP ?', '                                                PHP is a popular general-purpose scripting language that is especially suited to web development.[5] It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994;[6] the PHP reference implementation is now produced by The PHP Group.[7] PHP originally stood for Personal Home Page,[6] but it now stands for the recursive initialism PHP: Hypertext Preprocessor.[8]\r\n\r\nPHP code is usually processed on a web server by a PHP interpreter implemented as a module, a daemon or as a Common Gateway Interface (CGI) executable. On a web server, the result of the interpreted and executed PHP code ï¿½ which may be any type of data, such as generated HTML or binary image data ï¿½ would form the whole or part of a HTTP response. Various web template systems, web content management systems, and web frameworks exist which can be employed to orchestrate or facilitate the generation of that response. Additionally, PHP can be used for many programming tasks outside of the web context, such as standalone graphical applications[9] and robotic drone control.[10] Arbitrary PHP code can also be interpreted and executed via command-line interface (CLI).                                        ', 'php.png', '24 May 2020', 'Gaurav', 1, 'Published', 4),
(2, 'Is NodeJS killing PHP?', 'Node.js is an open-source, cross-platform, JavaScript runtime environment that executes JavaScript code outside of a web browser. Node.js lets developers use JavaScript to write command line tools and for server-side scripting—running scripts server-side to produce dynamic web page content before the page is sent to the user''s web browser. Consequently, Node.js represents a "JavaScript everywhere" paradigm,[6] unifying web-application development around a single programming language, rather than different languages for server- and client-side scripts.\n\nThough .js is the standard filename extension for JavaScript code, the name "Node.js" doesn''t refer to a particular file in this context and is merely the name of the product. Node.js has an event-driven architecture capable of asynchronous I/O. These design choices aim to optimize throughput and scalability in web applications with many input/output operations, as well as for real-time Web applications (e.g., real-time communication programs and browser games.', 'nodejs.png', '9 May 2020', 'Gaurav', 3, 'Published', 0),
(3, 'Is jQuery still worth learning?', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.[2] It is free, open-source software using the permissive MIT License.[3] As of May 2019, jQuery is used by 73% of the 10 million most popular websites.[4] Web analysis indicates that it is the most widely deployed JavaScript library by a large margin, having 3 to 4 times more usage than any other JavaScript library.[4][5]\n\njQuery''s syntax is designed to make it easier to navigate a document, select DOM elements, create animations, handle events, and develop Ajax applications. jQuery also provides capabilities for developers to create plug-ins on top of the JavaScript library. This enables developers to create abstractions for low-level interaction and animation, advanced effects and high-level, themeable widgets. The modular approach to the jQuery library allows the creation of powerful dynamic web pages and Web applications.', 'jquery.png', '9 May 2020', 'Gaurav', 2, 'Published', 1),
(5, 'What is python ?', 'PHP is a server side scripting language. that is used to develop Static websites or Dynamic websites or Web applications. PHP stands for Hypertext Pre-processor, that earlier stood for Personal Home Pages.\r\nPHP scripts can only be interpreted on a server that has PHP installed.\r\nThe client computers accessing the PHP scripts require a web browser only.\r\nA script is a set of programming instructions that is interpreted at runtime.\r\nA scripting language is a language that interprets scripts at runtime. Scripts are usually embedded into other software environments.', 'python.png', '24 May 2020', 'Gaurav', 4, 'Published', 1),
(6, 'What is AngularJs ?', '                                                AngularJS is a JavaScript-based open-source front-end web framework mainly maintained by Google and by a community of individuals and corporations to address many of the challenges encountered in developing single-page applications,AngularJS is a JavaScript-based open-source front-end web framework mainly maintained by Google and by a community of individuals and corporations to address many of the challenges encountered in developing single-page applications\r\nAngularJS is a JavaScript-based open-source front-end web framework mainly maintained by Google and by a community of individuals and corporations to address many of the challenges encountered in developing single-page applicationsAngularJS is a JavaScript-based open-source front-end web framework mainly maintained by Google and by a community of individuals and corporations to address many of the challenges encountered in developing single-page applications                                        ', 'anjular.png', '25 May 2020', 'Gaurav', 2, 'Published', 0),
(7, 'Career in Angularjs....?', 'AngularJS is an open source JS framework that performs the DOM manipulation. ... With increasing demand for single-page applications and the requirement for intuitive UI with compelling content, AngularJS is emerging as the development platform favored by cash-rich enterprises and bootstrapped startups alike.\r\nAngularJS is an open source JS framework that performs the DOM manipulation. ... With increasing demand for single-page applications and the requirement for intuitive UI with compelling content, AngularJS is emerging as the development platform favored by cash-rich enterprises and bootstrapped startups alike.AngularJS is an open source JS framework that performs the DOM manipulation. ... With increasing demand for single-page applications and the requirement for intuitive UI with compelling content, AngularJS is emerging as the development platform favored by cash-rich enterprises and bootstrapped startups alike.', 'angularjs.png', '25 May 2020', 'Gaurav', 2, 'Published', 0),
(8, 'Career in Php....?', 'There is good demand for PHP in the market and hence the need for PHP developers is higher. ... Hence you can definitely choose for a career in PHP in order to build a good future in software development. The market is full of awesome opportunities for those who are looking to build career in PHPThere is good demand for PHP in the market and hence the need for PHP developers is higher. ... Hence you can definitely choose for a career in PHP in order to build a good future in software development. The market is full of awesome opportunities for those who are looking to build career in \r\nPHPThere is good demand for PHP in the market and hence the need for PHP developers is higher. ... Hence you can definitely choose for a career in PHP in order to build a good future in software development. The market is full of awesome opportunities for those who are looking to build career in PHP', 'phpcareer.jpg', '25 May 2020', 'Gaurav', 1, 'Published', 0),
(9, 'About Node js..?Good for Career', '                        Node.js is an open-source, cross-platform, JavaScript runtime environment that executes JavaScript code outside of a web browser\r\nNode.js is an open-source, cross-platform, JavaScript runtime environment that executes JavaScript code outside of a web browser\r\nNode.js is an open-source, cross-platform, JavaScript runtime environment that executes JavaScript code outside of a web browserNode.js is an open-source, cross-platform, JavaScript runtime environment that executes JavaScript code outside of a web browserNode.js is an open-source, cross-platform, JavaScript runtime environment that executes JavaScript code outside of a web browserNode.js is an open-source, cross-platform, JavaScript runtime environment that executes JavaScript code outside of a web browser                    ', 'node.png', '25 May 2020', 'Gaurav', 3, 'Published', 0),
(10, 'What is PDO in PHP......?', 'PDO is an acronym for PHP Data Objects. PDO is a lean, consistent way to access databases. This means developers can write portable code much easier. PDO is not an abstraction layer like PearDB. PDO is a more like a data access layer which uses a unified API (Application Programming Interface),\r\nPDO is an acronym for PHP Data Objects. PDO is a lean, consistent way to access databases. This means developers can write portable code much easier. PDO is not an abstraction layer like PearDB. PDO is a more like a data access layer which uses a unified API (Application Programming Interface)\r\nPDO is an acronym for PHP Data Objects. PDO is a lean, consistent way to access databases. This means developers can write portable code much easier. PDO is not an abstraction layer like PearDB. PDO is a more like a data access layer which uses a unified API (Application Programming Interface)\r\nPDO is an acronym for PHP Data Objects. PDO is a lean, consistent way to access databases. This means developers can write portable code much easier. PDO is not an abstraction layer like PearDB. PDO is a more like a data access layer which uses a unified API (Application Programming Interface)\r\nPDO is an acronym for PHP Data Objects. PDO is a lean, consistent way to access databases. This means developers can write portable code much easier. PDO is not an abstraction layer like PearDB. PDO is a more like a data access layer which uses a unified API (Application Programming Interface)', 'pdo.png', '25 May 2020', 'Gaurav', 1, 'Published', 0),
(11, 'When & How Node.JS Should be Used..?', '                         If Node.js has ever been on your mind â€“â€“ or youâ€™ve recently started learning it â€“â€“ you might be asking yourself: where can I use Node.js? If the stats are to be believed, among three in four software engineers incorporate node either in the full stack or in the backend. With the thumping majority of apps using the popular JS run-time environment, itâ€™s a great opportunity to understand all existing Node.js use case and implement it in your organization., If Node.js has ever been on your mind â€“â€“ or youâ€™ve recently started learning it â€“â€“ you might be asking yourself: where can I use Node.js? If the stats are to be believed, among three in four software engineers incorporate node either in the full stack or in the backend. With the thumping majority of apps using the popular JS run-time environment, itâ€™s a great opportunity to understand all existing Node.js use case and implement it in your organization.                    ', 'nodejsuse.png', '25 May 2020', 'Gaurav', 3, 'Published', 0),
(13, 'career in python....?', 'hello python what is blog', 'whypython.jpg', '25 May 2020', 'Gaurav', 4, 'Published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Gaurav', 'gaurav@gmail.com', '123456'),
(2, 'Dev', 'Dev@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
