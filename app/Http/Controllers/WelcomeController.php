<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	// Google Analytics API
	private $ga_client_id;
	private $ga_email_address;
	private $ga_client_secret;
	private $ga_redirect_uris;
	private $ga_javascript_origins;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');

		// Google Analytics API
		$this->gaApiKey            = $_ENV['GA_API_KEY'];
		$this->gaClientID          = $_ENV['GA_CLIENT_ID'];
		$this->gaEmailAddress      = $_ENV['GA_EMAIL_ADDRESS'];
		$this->gaClientSecret      = $_ENV['GA_CLIENT_SECRET'];
		$this->gaRedirectUris      = $_ENV['GA_REDIRECT_URIS'];
		$this->gaJavascriptOrigins = $_ENV['GA_JAVASCRIPT_ORIGINS'];
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/vhosts/demo/google-analytics-reports/vendor/google/apiclient/src');
		require_once 'Google/Client.php';
		require_once 'Google/Service/Books.php';

		// Setup API client
		$client = new \Google_Client();
		$client->setApplicationName("Google Analytics Reports");
		$apiKey = $this->gaApiKey;
		$client->setDeveloperKey($apiKey);
		$service = new \Google_Service_Books($client);

		// Request data
		$optParams = array('filter' => 'free-ebooks');
		$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

		// This is an example of deferring a call.
		// $client->setDefer(true);
		// $optParams = array('filter' => 'free-ebooks');
		// $request = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
		// $results = $client->execute($request);

		return view('welcome', compact('results'));
	}

}
