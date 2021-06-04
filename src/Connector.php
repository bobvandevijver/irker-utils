<?php

namespace BobV\IrkerUtils;

class Connector
{
  /**
   * @var int
   */
  private $port;
  /**
   * @var string
   */
  private $server;

  public function __construct(string $server, int $port)
  {
    $this->server = $server;
    $this->port   = $port;
  }

  public function send(string $endpoint, string $message): void
  {
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    socket_connect($socket, $this->server, $this->port);
    $data = json_encode([
        'to'      => $endpoint,
        'privmsg' => $message,
    ]);
    socket_send($socket, $data, strlen($data), MSG_EOF);
    socket_close($socket);
  }
}
