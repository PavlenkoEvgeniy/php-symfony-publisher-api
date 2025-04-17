<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\BookCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class BookCategoryController extends AbstractController
{
    public function __construct(private BookCategoryService $bookCategoryService)
    {
    }

    #[Route('/api/v1/book/categories', name: 'api_v1_book_categories', methods: [Request::METHOD_GET])]
    public function categories(): JsonResponse
    {
        return $this->json($this->bookCategoryService->getBookCategories());
    }
}
