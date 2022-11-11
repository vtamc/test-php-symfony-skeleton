<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:test:create-user',
    description: 'Creates test user',
)]
class TestCreateUserCommand extends Command
{
    public function __construct 
    (
        private UserPasswordHasherInterface $hasher,
        private EntityManagerInterface $entityManager
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        
        $user = new User();

        $hashedPassword = $this->hasher->hashPassword(
            $user,
            'test'
        );
        
        $user->setRoles([ 'ROLE_USER' ]);
        $user->setEmail('user@test.com');
        $user->setPassword($hashedPassword);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->text('User created successfully');

        return Command::SUCCESS;
    }
}
