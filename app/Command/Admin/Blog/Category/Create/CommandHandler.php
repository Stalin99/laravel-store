<?php

namespace App\Command\Admin\Blog\Category\Create;

use App\Repository\Blog\CategoryRepository;

class CommandHandler
{
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke(Command $command)
    {
        $this->categories->create(
            $command->parent,
            $command->name,
            $command->slug,
            $command->title,
            $command->description
        );
    }
}