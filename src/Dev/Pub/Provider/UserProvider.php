<?php

namespace Dev\Pub\Provider;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Doctrine\DBAL\Connection;
use Dev\Pub\Entity\User;

class UserProvider implements UserProviderInterface
{
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function loadUserByUsername($username)
    {
        $stmt = $this->db->executeQuery('SELECT * FROM user WHERE username = ?', array($username));

        if (!$user = $stmt->fetch()) {
            throw new UsernameNotFoundException(sprintf('Username "%s" was not found.', $username));
        }

        return new User($user['id'], $user['username'], $user['password'], array($user['roles']));
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User){
            throw new \Exception(sprintf('Instance of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'Dev\Pub\Entity\User';
    }
}
