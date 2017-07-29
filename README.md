# StartupEngine: the CMS for Startups

A beautiful & open-source platform for launching startups.

Powered by [Contentful](https://contentful.com), [Laravel](https://laravel.com), and [Webslides](https://github.com/webslides/webslides/).

<div>
     <img src="https://images.contentful.com/x5o3atz1wqhm/2PWSbcsefYImQyMuqcIuGi/5efaa2c98a4819ef729885a7c3aa381c/App_Icon_2x.png" width="100">
     <img src="http://www.luckyrabbit.info/images/lr-logo.png" width="100">
</div>

**Table of Contents** 

- [Screenshots](#screenshots)
- [Demo](#demo)
- [Features](#features)
    - [Create pages](#create-pages)
    - [Control access to your content](#control-access-to-your-content)
    - [Accept payments](#accept-payments)
    - [Implement a marketing strategy](#implement-a-marketing-strategy)          
    - [Make informed decisions with analytics](#make-informed-decisions-with-analytics)   
    - [Optimize your site](#optimize-your-site)
    - [Strategic Benefits](#strategic-benefits)
- [Deploying](#deploying)

# Screenshots
<div>   
     <img src="/storage/app/docs/screenshots/Article.png" width="250">
      <img src="/storage/app/docs/screenshots/Articles.png" width="250">
     <img src="/storage/app/docs/screenshots/Analytics.png" width="250">     
</div>

# Demo
A demo is online at https://www.StartupEngine.io/

# Features 
Everything you need to launch & grow your website, app, or business.

##### Create pages
* [x] Landing pages
* [X] Products, services, and subscriptions
* [x] Blog posts
* [x] Help/documentation

##### Control access to your content
* [x] Public (viewable by guests)
* [ ] Private (unlisted, requires direct link)
* [ ] Protected (requires password)
* [ ] Premium (requires login)
* [ ] Paid (requires paid subscription)

##### Accept Payments 
* [ ] For Products
* [ ] For Services (i.e., for consulting or web development)
* [ ] For Subscriptions (i.e., for an app) 
* [ ] For Premium Content (i.e., music or video tutorials)
* [ ] Via easy & secure credit card processing
* [ ] All without leaving the site

##### Implement a marketing strategy
* [ ] Conduct market research to gain insight into your customers' psychological needs
* [ ] Schedule social media posts ahead of time 
 
##### Make informed decisions with analytics
* [ ] Get daily notifications about how your business is performing, including:
* [x] Visitors, page views, and clicks
* [x] Top performing pages, topics, and keywords
* [ ] Top selling products, services, & subscriptions
* [ ] Top search terms & traffic sources
* [ ] User insights (age, gender, country, etc)
* [ ] Social insights (mentions, likes, etc)
* [ ] Traction (how quickly guests convert into customers)

##### Optimize your site 
* [ ] Improve your landing page with automatic A/B Testing
* [ ] Automatically optimize your site for search engines
* [ ] Track user funnels to know where to focus your efforts (no configuration required)

##### Strategic Benefits
* StartupEngine is designed specifically for the needs of a startup (unlike Wordpress, Ghost, and other open-source CMS offerings.)

* Stop wasting time and effort making your own CMS or modifying another one to suit your needs. StartupEngine leverages the latest technologies, practices, and services, so you can focus on running your business.

* Custom coding not required. No plugins to install. Just enter your account information and go.

* No worries about vendor lock-in like you might have with services like Instapage, LeadPages, Wix, etc.

* Automatic updates via Github & Heroku. No need to pay for server automation services like Jekins, DeployBot, CodeShip, etc.

* Don't have funding? It's ok, you can run StartupEngine on your own at little or no cost.
 
* You're not on your own. Paid professional support is available when you need it.

* Launch a site, business, or campaign in under 5 minutes. 

# Deploying

## Requirements
At minimum, you will need a free [Contentful](https://contentful.com) account to manage your content on StartupEngine.

Simply specify your account credentials (Space ID, API Key, and Management Token) during deployment.

## Deploy to Heroku
Click the button below to deploy a new instance of StartupEngine to Heroku instantly.

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy?template=https://github.com/luckyrabbitllc/StartupEngine)

## Import Default Content
After deploying, you will need to import the default content to your Contentful space. 

Connect to your StartupEngine instance using the [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli)

```
$ heroku run bash --app $yourHerokuAppName
```

```
$ npm install contentful-import
```

```
$ php artisan command:ImportDefaultSpace
```

Your Contentful space is now populated with content.

Simply edit the existing pages or create new ones to administrate your site.

## Security Vulnerabilities

If you discover a security vulnerability within StartupEngine, please send an e-mail to info@StartupEngine.io. All security vulnerabilities will be promptly addressed.

## License

StartupEngine is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
