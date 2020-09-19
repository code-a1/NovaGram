# Create a Bot Instance

```php
new \skrtdev\NovaGram\Bot(string $token, array $settings = []);
```

### Token
$token is the Bot's token generated by @BotFather

### Settings
$settings is an array which contains some NovaGram configurations.
> None of these fields is required

| key              | value   | default | description                                                                                        |
|------------------|---------|---------|----------------------------------------------------------------------------------------------------|
| json_payload     | boolean | true    | Whether or not print json payload                                                                  |
| log_updates      | integer | false   | Chat id where raw json updates will be sent (set to false to disable)                              |
| debug            | integer | false   | Chat id where debug logs will be sent if an api error occurs (set to false to disable)             |
| disable_ip_check | boolean | false   | Whether or not disable telegram ip check (could be useful in case of reverse proxy, such as ngrok) |
| disable_webhook  | boolean | false   | Whether or not disable update receiving                                                            |
| parse_mode       | string  | no      | Parse mode that will be passed to all the methods that require it if not provided                  |
| exceptions       | bool    | true    | Whether or not throw \skrtdev\Telegram\Exception(s) when API Errors occurs                         |
| database         | array   | no      | [Database](database.md) connection info                                                            |

### JSON Payload

JSON Payload is a different way to make API Calls.
In Webhooks, you can print a JSON-Encoded request directly in the webhook page, that will be processed by Telegram afterwards, without effectively making an API Call.
> Only One API Call can use JSON Payload in the same execution contest

#### Pro:
   * Since no HTTP Request is involved, using Payload speeds up the bot.

#### Contro:
   * The API Call is printed in the response, so you won't be able to get its result, nor know if an error occurs. Also, the API Call will be processed when the execution of the script finishes.

[How to make a JSON Payload API Call](requests.md)

## Examples

```php
$Bot = new \skrtdev\NovaGram\Bot("YOUR_TOKEN", [
    "json_payload" => true,
    "debug" => 634408248,
    "parse_mode" => "HTML",
    "exceptions" => false
]);
```

In this example, `json_payload` is enabled, debug will be sent to `634408248`, default `parse_mode` is `HTML`, and no `\skrdtev\Telegram\Exception(s)` will be thrown when an API Error occurs

Go to [NovaGram Objects](objects.md)