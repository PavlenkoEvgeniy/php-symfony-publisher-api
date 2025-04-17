<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\BookCategory;
use App\Model\BookCategoryListItem;
use App\Model\BookCategoryListResponse;
use App\Repository\BookCategoryRepository;
use Doctrine\Common\Collections\Criteria;

class BookCategoryService
{
    public function __construct(private readonly BookCategoryRepository $bookCategoryRepository)
    {
    }

    public function getBookCategories(): BookCategoryListResponse
    {
        $bookCategories = $this->bookCategoryRepository->findBy([], ['title' => Criteria::ASC]);

        $items = \array_map(
            fn (BookCategory $bookCategory) => new BookCategoryListItem(
                $bookCategory->getId(), $bookCategory->getTitle(), $bookCategory->getSlug()
            ),
            $bookCategories
        );

        return new BookCategoryListResponse($items);
    }
}
