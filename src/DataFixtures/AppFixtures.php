<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use DateTime;
use Faker\Factory as Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {

        $user = (new User())->setEmail("lory@lory.fr")->setUsername("lory@lory.fr")->setCreatedAt(new DateTime())->setUpdateAt(new DateTime());
        $hashedPassword = $this->encoder->hashPassword($user, "lory");
        $user->setPassword($hashedPassword);
        $manager->persist($user);

        $contents = ["ICi le tcontenue de l'article 1", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, corrupti, assumenda quas modi reiciendis ipsa eum a debitis molestiae doloremque totam quam obcaecati. Aperiam asperiores sit libero. Nesciunt, laudantium pariatur?
        Velit laboriosam id, commodi a accusantium earum quod praesentium ullam veritatis ut repellat repellendus expedita voluptatum laudantium perferendis vitae. Ipsum consequatur deserunt, dolore ratione atque eveniet pariatur doloribus eius sunt."];

        for ($i = 0; $i < 2; $i++) {
            $article = (new Article())->setTitle("Article n°$i")->setContent($contents[$i])->setAuthor($user)->setCreatedAt(new DateTime())->setUpdateAt(new DateTime());
            $manager->persist($article);
        }

        $faker = Faker::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $email = $faker->email;
            $user = (new User())->setEmail($email)->setUsername($email);
            $hashedPassword = $this->encoder->hashPassword($user, $faker->password);
            $user->setPassword($hashedPassword)->setCreatedAt(new DateTime())->setUpdateAt(new DateTime());
            $manager->persist($user);
        }


        $manager->flush();
    }
}
