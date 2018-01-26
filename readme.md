# Google Analytics Reports

Basic example of Google Analytics API’s PHP integration in Laravel 5.5.

## Getting Started

### Setup an OAuth Client ID

_These initial steps are copied from [Google’s PHP quickstart tutorial](https://developers.google.com/analytics/devguides/reporting/core/v4/quickstart/web-php)._

- With your Google account, create a new [Google API project](https://console.developers.google.com/projectcreate)
- Go to that project’s [Credentials page](https://console.developers.google.com/apis/credentials) (you should see the project name in the top-left corner of the page).
- Click “Create Credentials” and create a new OAuth client ID.
- Configure your consent screen (you only need a Product Name; everything else is optional).
- For the client ID’s application type, select “Web Application.”
- Give it a name and add an authorized redirect URI: `http://localhost:8000/oauth2callback.php`*.
- When you see the popup with your client ID, click “OK” and on the right side of the page click the Download icon to download your `client_secrets.json`.
- **Save your `client_secrets.json`** in the project root. (You can see an example in `client_secrets.example.json`.)
- **Enable the Google Analytics API** for your project in the [Google API Library](https://console.developers.google.com/apis/library/analyticsreporting.googleapis.com). (If you don’t now, you’ll get an error with a link to enable it when you try to run the project.)

_*The Google Analytics tutorial uses port `8080`, but I’ve chosen to use `8000` instead._

### Install Dependencies

```bash
composer install
php artisan key:generate
```

### Add Google Analytics Settings

```bash
cp .env.example .env
```

Set `GA_VIEW_ID` to the View ID for the Google Analytics property/view you want to create reports for.

### Run the Project

```bash
php artisan serve
```

Open http://localhost:8000 in your browser and authorize the app with your Google account.

When you load the page, you should see your site’s session count for the last 7 days:

```
sessions: ###
```

## Creating Better Reports

Go to the [Reporting API’s docs](https://developers.google.com/analytics/devguides/reporting/core/v4/basics) for details on how to create bigger, better, custom reports.

## References

- [Hello Analytics Reporting API v4; PHP quickstart for web applications | Analytics Reporting API v4 | Google Developers](https://developers.google.com/analytics/devguides/reporting/core/v4/quickstart/web-php)
- [Credentials - API Project | Google Developers](https://console.developers.google.com/apis/credentials)
- [google-api-php-client on GitHub](https://github.com/google/google-api-php-client)
