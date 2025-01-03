<?php

namespace BobV\IrkerUtils;

readonly class Connector
{
  public function __construct(
    private string $server,
    private int $port,
    private ?int $sec = null,
    private ?int $usec = null)
  {
  }

  public function send(string $endpoint, string $message): void
  {
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    if ($this->sec !== null || $this->usec !== null) {
      socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, ['sec' => $this->sec ?? 0, 'usec' => $this->usec ?? 0]);
    }

    socket_connect($socket, $this->server, $this->port);
    $data = json_encode([
        'to'      => $endpoint,
        'privmsg' => $message,
    ]);
    socket_send($socket, $data, strlen($data), MSG_EOF);
    socket_close($socket);
  }
}
