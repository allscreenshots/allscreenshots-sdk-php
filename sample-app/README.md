# Allscreenshots PHP SDK - Sample application

A simple web application demonstrating the Allscreenshots PHP SDK.

## Features

- URL input for target website
- Device selector (Desktop HD, iPhone 14, iPad, etc.)
- Full page capture toggle
- Real-time screenshot display
- Error handling with user-friendly messages

## Requirements

- PHP 8.1 or higher
- Composer

## Setup

1. Install dependencies:

```bash
cd sample-app
composer install
```

2. Configure your API key:

```bash
cp .env.example .env
# Edit .env and add your ALLSCREENSHOTS_API_KEY
```

Or set it as an environment variable:

```bash
export ALLSCREENSHOTS_API_KEY=your-api-key
```

3. Start the development server:

```bash
composer start
```

4. Open your browser to [http://localhost:8080](http://localhost:8080)

## Usage

1. Enter a URL in the input field (e.g., `https://github.com`)
2. Select a device preset from the dropdown
3. Optionally check "Full page" to capture the entire page
4. Click "Take Screenshot"
5. The captured screenshot will appear in the result area

## Project structure

```
sample-app/
├── public/
│   └── index.php          # Application entry point
├── src/
│   └── Controllers/
│       ├── HomeController.php       # Home page
│       └── ScreenshotController.php # Screenshot API endpoint
├── templates/
│   └── home.twig          # Main page template
├── composer.json
├── .env.example
└── README.md
```

## Technology stack

- [Slim Framework](https://www.slimframework.com/) - PHP micro framework
- [Twig](https://twig.symfony.com/) - Template engine
- [PHP-DI](https://php-di.org/) - Dependency injection
- [Allscreenshots SDK](https://github.com/allscreenshots/allscreenshots-sdk-php) - Screenshot API client

## License

Apache License 2.0 - see [LICENSE](LICENSE) for details.
