<?php

namespace skrtdev\NovaGram;

use skrtdev\Telegram\{Update, Message, InlineQuery, ChosenInlineResult, CallbackQuery, ShippingQuery, PreCheckoutQuery, Poll, PollAnswer};

/**
 * Base Handler for handling updates
 */
class BaseHandler {

    protected Bot $Bot;

    final public function __construct(Bot $Bot)
    {
        $this->Bot = $Bot;
    }

    final public function handle(Update $update)
    {
        $this->onUpdate($update);
        $update_type = Dispatcher::getUpdateType($update);
        $handler_name = Dispatcher::parameterToHandler($update_type);
        $this->$handler_name($update->$update_type);
    }


    public function onUpdate(Update $update) {}
    public function onMessage(Message $message) {}
    public function onEditedMessage(Message $message) {}
    public function onChannelPost(Message $message) {}
    public function onEditedChannelPost(Message $message) {}
    public function onInlineQuery(InlineQuery $inline_query) {}
    public function onChosenInlineResult(ChosenInlineResult $chosen_inline_result) {}
    public function onCallbackQuery(CallbackQuery $callback_query) {}
    public function onShippingQuery(ShippingQuery $shipping_query) {}
    public function onPreCheckoutQuery(PreCheckoutQuery $pre_checkout_query) {}
    public function onPoll(Poll $poll) {}
    public function onPollAnswer(PollAnswer $poll_answer) {}
}


?>
