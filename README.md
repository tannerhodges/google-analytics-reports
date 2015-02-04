# Google Analytics Reports

[local.google-analytics-reports.com](local.google-analytics-reports.com)

API vars are stored in `.env` (see "Google Analytics API" vars in `.env.example`).

### Resources

- [Google Developers Console](https://console.developers.google.com/project)
- [google-api-php-client on GitHub](https://github.com/google/google-api-php-client)
- [Google Analytics -- Google Developers](https://developers.google.com/analytics/)

### Client Info

- APPLICATION TYPE
    - Web application
    - Accessed by web browsers over a network.
- AUTHORIZED JAVASCRIPT ORIGINS
    - Cannot contain a wildcard (http://*.example.com) or a path (http://example.com/subdir).
    - http://local.google-analytics-reports.com
- AUTHORIZED REDIRECT URIS
    - One URI per line. Needs to have a protocol, no URL fragments, and no relative paths. Can't be a non-private IP Address.
    - http://local.google-analytics-reports.com/oauth2callback
