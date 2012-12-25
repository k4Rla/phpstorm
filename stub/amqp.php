<?php
/**
 * @author Florin Patan <florin.patan@gmail.com>
 * @author Piter de Zvart https://github.com/pdezwart
 * @author Ben Pinepain <pinepain@gmail.com>
 *
 * @link   http://www.php.net/manual/en/book.amqp.php
 * @link   https://github.com/pdezwart/php-amqp
 * @link   https://github.com/dlsniper/phpamqp-doc
 * @link   https://github.com/alanxz/rabbitmq-c
 *
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
 * CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

/**
 * Passing in this constant as a flag will forcefully disable all other flags.
 * Use this if you want to temporarily disable the amqp.auto_ack ini setting.
 */
define('AMQP_NOPARAM', 0);

/**
 * Durable exchanges and queues will survive a broker restart, complete with all of their data.
 */
define('AMQP_DURABLE', 2);

/**
 * Passive exchanges are queues will not be redeclared, but the broker will throw an error if the exchange or
 * queue does not exist.
 */
define('AMQP_PASSIVE', 4);

/**
 * Valid for queues only, this flag indicates that only one client can be listening to and consuming from this queue.
 */
define('AMQP_EXCLUSIVE', 8);

/**
 * For exchanges, the auto delete flag indicates that the exchange will be deleted as soon as no more queues are
 * bound to it. If no queues were ever bound the exchange, the exchange will never be deleted.
 *
 * For queues, the auto delete flag indicates that the queue will be deleted as soon as there are no more listeners
 * subscribed to it.
 * If no subscription has ever been active, the queue will never be deleted.
 *
 * Note: Exclusive queues will always be automatically deleted with the client disconnects.
 */
define('AMQP_AUTODELETE', 16);


/**
 * Clients are not allowed to make specific queue bindings to exchanges defined with this flag.
 */
define('AMQP_INTERNAL', 32);

/**
 * When passed to the consume method for a clustered environment, do not consume from the local node.
 */
define('AMQP_NOLOCAL', 64);

/**
 * When passed to the AMQPQueue::get() and AMQPQueue::get() methods as a flag, the messages will be immediately
 * marked as acknowledged by the server upon delivery.
 *
 * @see AMQPQueue::get()
 */
define('AMQP_AUTOACK', 128);

/**
 * Passed on queue creation, this flag indicates that the queue should be deleted if it becomes empty.
 */
define('AMQP_IFEMPTY', 256);

/**
 * Passed on queue or exchange creation, this flag indicates that the queue or exchange should be deleted when
 * no clients are connected to the given queue or exchange.
 */
define('AMQP_IFUNUSED', 528);

/**
 * When publishing a message, the message must be routed to a valid queue. If it is not, an error will be returned.
 */
define('AMQP_MANDATORY', 1024);

/**
 * When publishing a message, mark this message for immediate processing by the broker. (High priority message.)
 */
define('AMQP_IMMEDIATE', 2048);

/**
 * If set during a call to AMQPQueue::ack(), the delivery tag is treated as "up to and including",
 * so that multiple messages can be acknowledged with a single method.
 *
 * If set to zero, the delivery tag refers to a single message.
 *
 * If the AMQP_MULTIPLE flag is set, and the delivery tag is zero, this indicates acknowledgement of
 * all outstanding messages.
 */
define('AMQP_MULTIPLE', 4096);

/**
 * If set during a call to AMQPExchange::bind(), the server will not respond to the method.
 *
 * The client should not wait for a reply method. If the server could not complete the method it will raise
 * a channel or connection exception.
 */
define('AMQP_NOWAIT', 8192);

/**
 * Requeue a message when sending
 */
define('AMQP_REQUEUE', 16384);

/**
 * A direct exchange type.
 */
define('AMQP_EX_TYPE_DIRECT', 'direct');

/**
 * A fanout exchange type.
 */
define('AMQP_EX_TYPE_FANOUT', 'fanout');

/**
 * A topic exchange type.
 */
define('AMQP_EX_TYPE_TOPIC', 'topic');

/**
 * A header exchange type.
 */
define('AMQP_EX_TYPE_HEADERS', 'headers');

define('AMQP_OS_SOCKET_TIMEOUT_ERRNO', 536870947);


/**
 * Represents a connection to an AMQP broker
 *
 * @link http://www.php.net/manual/en/class.amqpconnection.php
 */
class AMQPConnection {
    /**
     * Establish a connection with the AMQP broker.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function connect() {
    }

    /**
     * Creates an AMQPConnection instance representing a connection to an AMQP broker.
     *
     * The credentials is an optional array of credential information for connecting to the AMQP broker.
     * $credentials = array(
     *  'host'     => amqp.host     The host to connect too. Note: Max 1024 characters.
     *  'port'     => amqp.port     Port on the host.
     *  'vhost'    => amqp.vhost    The virtual host on the host. Note: Max 128 characters.
     *  'login'    => amqp.login    The login name to use. Note: Max 128 characters.
     *  'password' => amqp.password Password. Note: Max 128 characters.
     *  'timeout' => amqp.timeout   NOTE: non-documented. Amount of time, in seconds (may be float), after which this instance of an AMQPConnection object times out a request to the broker.
     * )
     *
     * All the other keys are ignored.
     * Note: A connection will not be established until AMQPConnection::connect() is called.
     *
     * @param array $credentials
     *
     * @throws AMQPException Throws an exception on parameter parsing failures, and option errors.
     */
    public function __construct(array $credentials = array()) {
    }

    /**
     * Closes the connection with the AMQP broker
     *
     * @return Boolean Returns true if connection was successfully closed, false otherwise
     */
    public function disconnect() {
    }

    /**
     * Get the configured host
     *
     * @return String The configured host as a string.
     */
    public function getHost() {
    }

    /**
     * Get the configured login
     *
     * @return String The configured login as a string.
     */
    public function getLogin() {
    }

    /**
     * Get the configured password
     *
     * @return String The configured password as a string.
     */
    public function getPassword() {
    }

    /**
     * Get the configured port
     *
     * @return Integer The configured port as an integer.
     */
    public function getPort() {
    }

    /**
     * Get the configured timeout
     *
     * @return Float The configured timeout as an float.
     */
    public function getTimeout() {
    }

    /**
     * Get the configured vhost
     *
     * @return String The configured virtual host as a string
     */
    public function getVhost() {
    }

    /**
     * Determine if the AMQPConnection object is connected to the broker
     * It does so by checking the return status of the last command
     *
     * @return Boolean Returns true if connected, false otherwise
     */
    public function isConnected() {
    }

    /**
     * Closes any open connection and creates a new connection with the AMQP broker
     *
     * @return Boolean Returns TRUE on success or FALSE on failure
     */
    public function reconnect() {
    }

    /**
     * Set the amqp host
     *
     * @param String $host
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws an exception if host is longer then 1024 characters.
     */
    public function setHost($host) {
    }

    /**
     * Set the login
     *
     * @param String $login
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws an exception if login is longer then 32 characters.
     */
    public function setLogin($login) {
    }

    /**
     * Set the password
     *
     * @param String $password
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws an exception if password is longer then 32 characters.
     */
    public function setPassword($password) {
    }

    /**
     * Set the port
     *
     * @param Integer $port
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws an exception if port is longer not between 1 and 65535.
     */
    public function setPort($port) {
    }


    /**
     * Set the timeout used to connect to the broker
     *
     * @param Float $timeout
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws an exception if timeout is longer less than 0.
     */
    public function setTimeout($timeout) {
    }

    /**
     * Set the amqp virtual host
     *
     * @param String $vhost
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws an exception if host is longer then 32 characters.
     */
    public function setVhost($vhost) {
    }

}

/**
 * Represents a channel on an connection. Each connection can have multiple channels
 *
 * @link http://www.php.net/manual/en/class.amqpchannel.php
 */
class AMQPChannel {
    /**
     * Commit a pending transaction
     * AMQPChannel::startTransaction() must be called prior to this.
     *
     * @return Boolean Returns true when transaction was commited succesfully
     *
     * @throws AMQPChannelException     Throws AMQPChannelException exception if no transaction was started prior to calling this method.
     * @throws AMQPConnectionException  Throws AMQPConnectionException if the connection to the broker was lost.
     */
    public function commitTransaction() {
    }

    /**
     * Creates an AMQPChannel instance representing a channel on the given connection.
     *
     * @param AMQPConnection $amqp_connection A instance of AMQPConnection with an active connection to a broker.
     *
     * @throws AMQPConnectionException Throws exception if the connection to the broker was lost.
     */
    public function __construct(AMQPConnection $amqp_connection) {
    }

    /**
     * Check the channel connection
     *
     * @return Boolean Returns true of the channel is still connected, false otherwise
     */
    public function isConnected() {
    }

    /**
     * Set the Quality Of Service settings for the given channel
     *
     * Specify the amount of data to prefetch in terms of window size (octets) or number of messages from a queue during a
     * AMQPQueue::consume() or AMQPQueue::get() method call. The client will prefetch data up to size octets or count
     * messages from the server, whichever limit is hit first.
     *
     * Setting either value to 0 will instruct the client to ignore that particular setting.
     *
     * A call to AMQPChannel::qos() will overwrite any values set by calling AMQPChannel::setPrefetchSize() and AMQPChannel::setPrefetchCount().
     *
     * If the call to either AMQPQueue::consume() or AMQPQueue::get() is done with the AMQP_AUTOACK flag set, the client
     * will not do any prefetching of data, regardless of the QOS settings.
     *
     * @param Integer $size  The window size, in octets, to prefetch.
     * @param Integer $count The number of messages to prefetch.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws exception if the connection to the broker was lost.
     */
    public function qos($size, $count) {
    }

    /**
     * Rollback an existing transaction.
     * AMQPChannel::startTransaction() must be called prior to this.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPChannelException    Throws an exception if no transaction was started prior to calling this method.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost.
     */
    public function rollbackTransaction() {
    }

    /**
     * Set the number of messages to prefetch from the broker during a call to AMQPQueue::consume() or AMQPQueue::get().
     * Any call to this method will automatically set the prefetch window size to 0, meaning that the prefetch window size setting will be ignored.
     *
     * If the call to either AMQPQueue::consume() or AMQPQueue::get() is done with the AMQP_AUTOACK flag set, this setting will be ignored.
     *
     * @param Integer $count The number of messages to prefetch.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws an exception if the connection to the broker was lost.
     */
    public function setPrefetchCount($count) {
    }

    /**
     * Set the prefetch window size, in octets, during a call to AMQPQueue::consume() or AMQPQueue::get().
     * Any call to this method will automatically set the prefetch message count to 0, meaning that the prefetch message count setting will be ignored.
     *
     * If the call to either AMQPQueue::consume() or AMQPQueue::get() is done with the AMQP_AUTOACK flag set, this setting will be ignored.
     *
     * @param Integer $size The window size, in octets, to prefetch.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws an exception if the connection to the broker was lost.
     */
    public function setPrefetchSize($size) {
    }

    /**
     * Start a transaction.
     * This method must be called on the given channel prior to calling AMQPChannel::commitTransaction() or AMQPChannel::rollbackTransaction().
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throws AMQPConnectionException Throws an exception if the connection to the broker was lost.
     */
    public function startTransaction() {
    }
}

/**
 * Represents an AMQP exchange.
 *
 * @link http://www.php.net/manual/en/class.amqpexchange.php
 */
class AMQPExchange {
    /**
     * Bind an exchange to another exchange using the specified routing key.
     *
     * @param String $srcExchangeName The name of the destination exchange in the binding.
     * @param String $routingKey      The name of the routing key in the binding.
     * @param String $flags           Optional. Only accepted flag is AMQP_NOWAIT
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPExchangeException   Throws an exception on failure.
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost.
     */
    public function bind($srcExchangeName, $routingKey, $flags) {
    }

    /**
     * Returns a new instance of an AMQPExchange object, associated with the given AMQPChannel object.
     *
     * @param AMQPChannel $amqp_channel A valid AMQPChannel object, connected to a broker.
     *
     * @throw AMQPExchangeException   Throws an exception when amqp_channel is not connected to a broker.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost.
     */
    public function __construct(AMQPChannel $amqp_channel) {
    }

    /**
     * Declare a new exchange on the broker.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPExchangeException   Throws an exception on failure.
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function PS_UNRESERVE_PREFIX_declare() {
    }

    /**
     * Delete and exchange from the broker.
     *
     * @param Integer $flags Optionally AMQP_IFUNUSED can be specified to indicate the exchange should not be deleted until no clients are connected to it.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPExchangeException   Throws an exception on failure.
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function delete($flags = AMQP_NOPARAM) {
    }

    /**
     * Get the argument associated with the given key.
     *
     * @param String $key The key to look up.
     *
     * @return Integer|String|Boolean The string or integer value associated with the given key, or FALSE if the key is not set.
     *
     */
    public function getArgument($key) {
    }

    /**
     * Get all arguments as an array of key/value pairs that are currently set on the given exchange.
     *
     * @return array An array containing all of the set key/value pairs.
     */
    public function getArguments() {
    }

    /**
     * Get all the flags currently set on the given exchange.
     *
     * @return Integer An integer bitmask of all the flags currently set on this exchange object.
     */
    public function getFlags() {
    }

    /**
     * Get the configured name.
     *
     * @return String The configured name as a string.
     */
    public function getName() {
    }

    /**
     * Get the configured type.
     *
     * @return String This function has no parameters.
     */
    public function getType() {
    }

    /**
     * Publish a message to the exchange represented by the AMQPExchange object.
     *
     * @param String  $message     The message to publish
     * @param String  $routing_key The routing key to which to publish.
     * @param Integer $flags       One or more of AMQP_MANDATORY and AMQP_IMMEDIATE.
     * @param Array   $attributes  One or more from the list:
     *  $attributes = array(
     *   'content_type'
     *   'content_encoding'
     *   'message_id'
     *   'user_id'
     *   'app_id'
     *   'delivery_mode'
     *   'priority'
     *   'timestamp'
     *   'expiration'
     *   'type'
     *   'reply_to'
     *   'correlation_id'
     *  )
     *
     * Note: Any of the attributes that is not in the list will be converted to custom headers
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPExchangeException   Throws an exception on failure.
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function publish($message, $routing_key, $flags = AMQP_NOPARAM, array $attributes = array()) {
    }

    /**
     * Set the key to the given value.
     *
     * @param String $key   The key to set.
     * @param Mixed  $value The value to set.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function setArgument($key, $value) {
    }

    /**
     * Set all arguments on the given exchange. All other argument settings will be wiped.
     *
     * @param Array $arguments An array of key/value pairs of arguments.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function setArguments(array $arguments) {
    }

    /**
     * Set the flags on an exchange.
     *
     * @param Integer $flags A bitmask of flags. This call currently only considers the following flags: AMQP_DURABLE, AMQP_PASSIVE.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function setFlags($flags) {
    }

    /**
     * Set the name of the exchange.
     *
     * @param String $exchange_name The name of the exchange to set as string.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function setName($exchange_name) {
    }

    /**
     * Set the type of the exchange. This can be any of AMQP_EX_TYPE_DIRECT, AMQP_EX_TYPE_FANOUT, AMQP_EX_TYPE_HEADER or AMQP_EX_TYPE_TOPIC.
     *
     * @param String $exchange_type
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function setType($exchange_type) {
    }
}

/**
 * Represents an AMQP queue.
 *
 * @link http://www.php.net/manual/en/class.amqpqueue.php
 */
class AMQPQueue {
    /**
     * This method allows the acknowledgement of a message that is retrieved without the AMQP_AUTOACK flag through AMQPQueue::get() or AMQPQueue::consume()
     *
     * @param Integer $delivery_tag The message delivery tag of which to acknowledge receipt.
     * @param Integer $flags        The only valid flag that can be passed is AMQP_MULTIPLE.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function ack($delivery_tag, $flags = AMQP_NOPARAM) {
    }

    /**
     * The bind method will bind the given queue to the specified routing key on the given exchange.
     *
     * @param String $exchange_name The exchange name on which to bind.
     * @param String $routing_key   The routing key to which to bind.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function bind($exchange_name, $routing_key) {
    }

    /**
     * Cancel a queue that is already bound to an exchange and routing key.
     *
     * @param String $consumer_tag The queue name to cancel, if the queue object is not already representative of a queue.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function cancel($consumer_tag = "") {
    }

    /**
     * Creates an AMQPQueue instance representing an AMQP queue on the broker.
     *
     * @param AMQPChannel $amqp_channel
     *
     * @throw AMQPQueueException      Throws an exception when amqp_channel is not connected to a broker.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function __construct(AMQPChannel $amqp_channel) {
    }

    /**
     * Blocking function that will retrieve the next message from the queue as it becomes available and will pass it off to the callback.
     *
     * @param callable $callback A callback function to which the consumed message will be passed.
     *                           The function must accept at a minimum one parameter, an AMQPEnvelope object, and an optional
     *                           second parameter the AMQPQueue from which the message was consumed.
     *                           The AMQPQueue::consume() will not return the processing thread back to the PHP script until
     *                           the callback function returns FALSE.
     * @param Integer  $flags    A bitmask of any of the flags: AMQP_NOACK.
     *
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function consume($callback, $flags = AMQP_NOPARAM) {
    }

    /**
     * Declare a new queue on the broker.
     *
     * @return Integer Returns the message count.
     *
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function PS_UNRESERVE_PREFIX_declare() {
    }

    /**
     * Delete a queue from the broker, including its entire contents of unread or unacknowledged messages.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function delete() {
    }

    /**
     * Retrieve the next available message from the queue. If no messages are present in the queue, this function will return FALSE immediately.
     * This is a non blocking alternative to the AMQPQueue::consume() method.
     *
     * Currently, the only supported flag for the flags parameter is AMQP_AUTOACK. If this flag is passed in, then the
     * message returned will automatically be marked as acknowledged by the broker as soon as the frames are sent to the client.
     *
     * @param Integer $flags A bitmask of supported flags for the method call. Currently, the only the supported flag is AMQP_AUTOACK. If this value is not provided, it will use the value of amqp.auto_ack.
     *
     * @return AMQPEnvelope|Boolean An instance of AMQPEnvelope representing the message pulled from the queue, or FALSE.
     */
    public function get($flags) {
    }

    /**
     * Get the argument associated with the given key.
     *
     * @param String $key The key to look up.
     *
     * @return String|Integer|Boolean The string or integer value associated with the given key, or FALSE if the key is not set.
     */
    public function getArgument($key) {
    }

    /**
     * Get all arguments as an array of key/value pairs that are currently set on the given queue.
     *
     * @return Array An array containing all of the set key/value pairs.
     */
    public function getArguments() {
    }

    /**
     * Get all the flags currently set on the given queue.
     *
     * @return Integer An integer bitmask of all the flags currently set on this exchange object.
     */
    public function getFlags() {
    }

    /**
     * Get the configured name.
     *
     * @return String The configured name as a string.
     */
    public function getName() {
    }

    /**
     * Mark the message identified by delivery_tag as explicitly not acknowledged. This method can only be called on messages
     * that have not yet been acknowledged, meaning that messages retrieved with by AMQPQueue::consume() and AMQPQueue::get()
     * and using the AMQP_AUTOACK flag are not eligible.
     *
     * When called, the broker will immediately put the message back onto the queue, instead of waiting until the connection is closed.
     *
     * This method is only supported by the RabbitMQ broker. The behavior of calling this method while connected to any other broker is undefined.
     *
     * @param String  $delivery_tag The delivery tag by which to identify the message.
     * @param Integer $flags        A bitmask of flags.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function nack($delivery_tag, $flags = AMQP_NOPARAM) {
    }

    /**
     * Purge the contents of a queue.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function purge() {
    }

    /**
     * Set the key to the given value.
     *
     * @param String $key   The key to set.
     * @param Mixed  $value The value to set.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function setArgument($key, $value) {
    }

    /**
     * Set all arguments on the given queue. All other argument settings will be wiped.
     *
     * @param array $arguments An array of key/value pairs of arguments.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function setArguments(array $arguments) {
    }

    /**
     * Set the flags on the queue.
     *
     * @param Integer $flags A bitmask of flags. This call currently only supports a bitmask of the following flags: AMQP_DURABLE, AMQP_PASSIVE, AMQP_EXCLUSIVE, AMQP_AUTODELETE.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function setFlags($flags) {
    }

    /**
     * Set the name of the queue
     *
     * @param String $queue_name The name of the queue as a string.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     */
    public function setName($queue_name) {
    }

    /**
     * Remove a routing key binding on an exchange from the given queue.
     *
     * @param String $exchange_name The name of the exchange on which the queue is bound.
     * @param String $routing_key   The binding routing key used by the queue.
     *
     * @return Boolean Returns TRUE on success or FALSE on failure.
     *
     * @throw AMQPChannelException    Throws an exception if the channel is not open.
     * @throw AMQPConnectionException Throws an exception if the connection to the broker was lost
     */
    public function unbind($exchange_name, $routing_key) {
    }
}

/**
 * Contains a message and all of its attributes.
 *
 * @link http://www.php.net/manual/en/class.amqpenvelope.php
 */
class AMQPEnvelope {

    /**
     * Get the application id of the message.
     *
     * @return String The application id of the message.
     */
    public function getAppId() {
    }

    /**
     * Get the body of the message.
     *
     * @return String The contents of the message body.
     */
    public function getBody() {
    }

    /**
     * Get the content encoding of the message.
     *
     * @return String The content encoding of the message.
     */
    public function getContentEncoding() {
    }

    /**
     * Get the content type of the message.
     *
     * @return String The content type of the message.
     */
    public function getContentType() {
    }

    /**
     * Get the correlation id of the message.
     *
     * @return String The correlation id of the message.
     */
    public function getCorrelationId() {
    }

    /**
     * Get the delivery tag of the message.
     *
     * @return String The delivery tag of the message.
     */
    public function getDeliveryTag() {
    }

    /**
     * Get the exchange name on which the message was published.
     *
     * @return String The exchange name on which the message was published.
     */
    public function getExchangeName() {
    }

    /**
     * Get the expiration of the message.
     *
     * @return String The message expiration.
     */
    public function getExpiration() {
    }

    /**
     * Get the header value for a specific header key.
     *
     * @param String $header_key
     *
     * @return String|Boolean The contents of the specified header or FALSE if not set.
     */
    public function getHeader($header_key) {
    }

    /**
     * Get the headers of the message.
     *
     * @return Array An array of key value pairs associated with the message.
     */
    public function getHeaders() {
    }

    /**
     * Get the message id of the message.
     *
     * @return String The message id.
     */
    public function getMessageId() {
    }

    /**
     * Get the priority of the message.
     *
     * @return String The message priority.
     */
    public function getPriority() {
    }

    /**
     * Get the reply to of the message.
     *
     * @return String The contents of the reply to field.
     */
    public function getReplyTo() {
    }

    /**
     * Get the routing key of the message.
     *
     * @return String The message routing key.
     */
    public function getRoutingKey() {
    }

    /**
     * Get the timestamp of the message.
     *
     * @return String The message timestamp.
     */
    public function getTimeStamp() {
    }

    /**
     * Get the type of the message.
     *
     * @return String The message type.
     */
    public function getType() {
    }

    /**
     * Get the user id of the message.
     *
     * @return String The message user id.
     */
    public function getUserId() {
    }

    /**
     * Whether this is a redelivery of a message. If this message has been delivered and AMQPEnvelope::nack() was called,
     * the message will be put back on the queue to be redelivered, at which point the message will always return TRUE when this method is called.
     *
     * @return Boolean Returns TRUE if this is a redelivery, FALSE otherwise.
     */
    public function isRedelivery() {
    }
}


class AMQPException extends Exception {

}

class AMQPConnectionException extends Exception {

}

class AMQPChannelException extends Exception {

}

class AMQPQueueException extends Exception {

}

class AMQPExchangeException extends Exception {

}