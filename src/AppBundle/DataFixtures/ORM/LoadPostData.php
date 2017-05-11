<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadPostData implements FixtureInterface {

    public function load(ObjectManager $manager) {

        $faker = Factory::create();

        for ($i = 1; $i <= 200; $i++) {
            $post = new Post();
            $post->setTitle($faker->sentence(3));
            $post->setLead($faker->text(200));
            $post->setContent($faker->text(700));
            $post->setCreatedAt($faker->dateTimeThisMonth);

            $manager->persist($post);
        }
        $manager->flush();
    }

}
