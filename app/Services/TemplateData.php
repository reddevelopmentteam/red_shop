<?php

namespace App\Services;

use Illuminate\Support\Str;

class TemplateData
{
    /** @var array<int, array{category: string}> */
    private static array $categoryTypes = [
        'SaaS' => 'SaaS',
        'Landing Page' => 'Startup',
        'Portfolio' => 'Agency',
        'Dashboard' => 'Business',
        'E-Commerce' => 'Business',
        'Blog' => 'Personal',
        'Education' => 'Personal',
        'Data Management' => 'Business',
    ];

    /** @var array<string, array{label: string, slug: string}> */
    private static array $techMap = [
        'HTML' => ['label' => 'HTML', 'slug' => 'html5'],
        'CSS' => ['label' => 'CSS', 'slug' => 'css3'],
        'Tailwind' => ['label' => 'Tailwind', 'slug' => 'tailwindcss'],
        'JavaScript' => ['label' => 'JavaScript', 'slug' => 'javascript'],
        'React' => ['label' => 'React', 'slug' => 'react'],
        'Vue' => ['label' => 'Vue', 'slug' => 'vuejs'],
        'Laravel' => ['label' => 'Laravel', 'slug' => 'laravel'],
        'Next.js' => ['label' => 'Next.js', 'slug' => 'nextjs'],
        'PHP' => ['label' => 'PHP', 'slug' => 'php'],
        'Node.js' => ['label' => 'Node.js', 'slug' => 'nodejs'],
        'MySQL' => ['label' => 'MySQL', 'slug' => 'mysql'],
        'Python' => ['label' => 'Python', 'slug' => 'python'],
    ];

    /**
     * @return array<int, array{name: string, slug: string, category: string, type: string, price: ?string, originalPrice: ?string, discount: ?int, status: string, about: string, features: array<int, string>, techStacks: array<int, array{label: string, slug: string}>, version: string, demoLink: string, license: string, images: array<int, string>, lastUpdated: string, preview: string, filesIncluded: string, thumbnail: string}>
     */
    public static function all(): array
    {
        $templates = [
            ['name' => 'Portfolio Agency', 'category' => 'Portfolio', 'price' => 'Rp299.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Landing Page', 'category' => 'Landing Page', 'price' => 'Rp249.000', 'originalPrice' => 'Rp349.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Admin Dashboard', 'category' => 'Dashboard', 'price' => null, 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'Toko Online Fashion', 'category' => 'E-Commerce', 'price' => 'Rp399.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Creative Portfolio', 'category' => 'Portfolio', 'price' => 'Rp199.000', 'originalPrice' => 'Rp299.000', 'discount' => 33, 'status' => 'tersedia'],
            ['name' => 'Startup Landing', 'category' => 'Landing Page', 'price' => 'Rp279.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Analytics Dashboard', 'category' => 'Dashboard', 'price' => 'Rp449.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Pricing Page', 'category' => 'SaaS', 'price' => 'Rp179.000', 'originalPrice' => 'Rp249.000', 'discount' => 28, 'status' => 'tersedia'],
            ['name' => 'Data Analytics Panel', 'category' => 'Data Management', 'price' => 'Rp349.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'Marketplace Store', 'category' => 'E-Commerce', 'price' => 'Rp499.000', 'originalPrice' => 'Rp599.000', 'discount' => 17, 'status' => 'tersedia'],
            ['name' => 'Personal Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'University Portal', 'category' => 'Education', 'price' => 'Rp329.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Corporate Profile', 'category' => 'Portfolio', 'price' => 'Rp259.000', 'originalPrice' => 'Rp359.000', 'discount' => 28, 'status' => 'tersedia'],
            ['name' => 'Product Landing', 'category' => 'Landing Page', 'price' => 'Rp219.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'CRM Dashboard', 'category' => 'Dashboard', 'price' => null, 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'Inventory System', 'category' => 'Data Management', 'price' => 'Rp379.000', 'originalPrice' => 'Rp479.000', 'discount' => 21, 'status' => 'tersedia'],
            ['name' => 'Multi Vendor Store', 'category' => 'E-Commerce', 'price' => 'Rp549.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Tech Blog', 'category' => 'Blog', 'price' => 'Rp169.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'LMS Platform', 'category' => 'Education', 'price' => 'Rp419.000', 'originalPrice' => 'Rp519.000', 'discount' => 19, 'status' => 'tersedia'],
            ['name' => 'SaaS Dashboard', 'category' => 'SaaS', 'price' => 'Rp299.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Agency Portfolio', 'category' => 'Portfolio', 'price' => 'Rp229.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Minimal Blog', 'category' => 'Blog', 'price' => 'Rp129.000', 'originalPrice' => 'Rp199.000', 'discount' => 35, 'status' => 'tersedia'],
            ['name' => 'Cloud Dashboard', 'category' => 'SaaS', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Edu Portal', 'category' => 'Education', 'price' => 'Rp289.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],

            ['name' => 'Modern Portfolio', 'category' => 'Portfolio', 'price' => 'Rp269.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'App Landing Page', 'category' => 'Landing Page', 'price' => 'Rp239.000', 'originalPrice' => 'Rp319.000', 'discount' => 25, 'status' => 'tersedia'],
            ['name' => 'Finance Dashboard', 'category' => 'Dashboard', 'price' => 'Rp479.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Onboarding', 'category' => 'SaaS', 'price' => 'Rp199.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'CRM System', 'category' => 'Data Management', 'price' => 'Rp429.000', 'originalPrice' => 'Rp529.000', 'discount' => 19, 'status' => 'tersedia'],
            ['name' => 'Electronics Store', 'category' => 'E-Commerce', 'price' => 'Rp459.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'News Blog', 'category' => 'Blog', 'price' => 'Rp159.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'School Portal', 'category' => 'Education', 'price' => 'Rp319.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'One Page Landing', 'category' => 'Landing Page', 'price' => 'Rp189.000', 'originalPrice' => 'Rp269.000', 'discount' => 30, 'status' => 'tersedia'],
            ['name' => 'Project Dashboard', 'category' => 'Dashboard', 'price' => 'Rp389.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Recipe Blog', 'category' => 'Blog', 'price' => 'Rp139.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Metrics', 'category' => 'SaaS', 'price' => 'Rp329.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'Gadget Store', 'category' => 'E-Commerce', 'price' => 'Rp489.000', 'originalPrice' => 'Rp589.000', 'discount' => 17, 'status' => 'tersedia'],
            ['name' => 'Minimal Portfolio', 'category' => 'Portfolio', 'price' => 'Rp179.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Event Landing', 'category' => 'Landing Page', 'price' => 'Rp209.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Warehouse System', 'category' => 'Data Management', 'price' => 'Rp399.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Course Platform', 'category' => 'Education', 'price' => 'Rp369.000', 'originalPrice' => 'Rp469.000', 'discount' => 21, 'status' => 'tersedia'],
            ['name' => 'HR Dashboard', 'category' => 'Dashboard', 'price' => 'Rp419.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Travel Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Fashion Store', 'category' => 'E-Commerce', 'price' => 'Rp439.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Analytics', 'category' => 'SaaS', 'price' => 'Rp279.000', 'originalPrice' => 'Rp379.000', 'discount' => 26, 'status' => 'tersedia'],
            ['name' => 'Real Estate Landing', 'category' => 'Landing Page', 'price' => 'Rp299.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Medical Portal', 'category' => 'Education', 'price' => 'Rp349.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Creative Agency', 'category' => 'Portfolio', 'price' => 'Rp249.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],

            ['name' => 'Startup Dashboard', 'category' => 'Dashboard', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Product Landing V2', 'category' => 'Landing Page', 'price' => 'Rp219.000', 'originalPrice' => 'Rp299.000', 'discount' => 27, 'status' => 'tersedia'],
            ['name' => 'Portfolio Minimal', 'category' => 'Portfolio', 'price' => 'Rp189.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'E-Commerce Lite', 'category' => 'E-Commerce', 'price' => 'Rp349.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Starter', 'category' => 'SaaS', 'price' => 'Rp169.000', 'originalPrice' => 'Rp239.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Photo Blog', 'category' => 'Blog', 'price' => 'Rp129.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Student Portal', 'category' => 'Education', 'price' => 'Rp299.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Data Warehouse', 'category' => 'Data Management', 'price' => 'Rp459.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Service Landing', 'category' => 'Landing Page', 'price' => 'Rp259.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Admin Panel', 'category' => 'Dashboard', 'price' => 'Rp399.000', 'originalPrice' => 'Rp499.000', 'discount' => 20, 'status' => 'tersedia'],
            ['name' => 'Freelancer Portfolio', 'category' => 'Portfolio', 'price' => 'Rp159.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Grocery Store', 'category' => 'E-Commerce', 'price' => 'Rp379.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Music Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'SaaS Billing', 'category' => 'SaaS', 'price' => 'Rp289.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Training Platform', 'category' => 'Education', 'price' => 'Rp339.000', 'originalPrice' => 'Rp439.000', 'discount' => 23, 'status' => 'tersedia'],
            ['name' => 'Inventory Dashboard', 'category' => 'Data Management', 'price' => 'Rp409.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Overview', 'category' => 'SaaS', 'price' => 'Rp249.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Book Store', 'category' => 'E-Commerce', 'price' => 'Rp319.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Design Portfolio', 'category' => 'Portfolio', 'price' => 'Rp209.000', 'originalPrice' => 'Rp289.000', 'discount' => 28, 'status' => 'tersedia'],
            ['name' => 'Webinar Landing', 'category' => 'Landing Page', 'price' => 'Rp179.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Fitness Blog', 'category' => 'Blog', 'price' => 'Rp139.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Certification Portal', 'category' => 'Education', 'price' => 'Rp309.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'API Dashboard', 'category' => 'Dashboard', 'price' => 'Rp439.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Service Dashboard', 'category' => 'Dashboard', 'price' => 'Rp369.000', 'originalPrice' => 'Rp469.000', 'discount' => 21, 'status' => 'tersedia'],

            ['name' => 'Photography Portfolio', 'category' => 'Portfolio', 'price' => 'Rp239.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'App Preview Landing', 'category' => 'Landing Page', 'price' => 'Rp199.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Sales Dashboard', 'category' => 'Dashboard', 'price' => 'Rp429.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Suite', 'category' => 'SaaS', 'price' => 'Rp319.000', 'originalPrice' => 'Rp419.000', 'discount' => 24, 'status' => 'tersedia'],
            ['name' => 'Fashion Marketplace', 'category' => 'E-Commerce', 'price' => 'Rp469.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Travel Blog V2', 'category' => 'Blog', 'price' => 'Rp159.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Research Portal', 'category' => 'Education', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'CRM Analytics', 'category' => 'Data Management', 'price' => 'Rp449.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Crypto Landing', 'category' => 'Landing Page', 'price' => 'Rp229.000', 'originalPrice' => 'Rp329.000', 'discount' => 30, 'status' => 'tersedia'],
            ['name' => 'Operations Dashboard', 'category' => 'Dashboard', 'price' => 'Rp389.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Lifestyle Blog', 'category' => 'Blog', 'price' => 'Rp139.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Platform', 'category' => 'SaaS', 'price' => 'Rp269.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Online Course', 'category' => 'Education', 'price' => 'Rp389.000', 'originalPrice' => 'Rp489.000', 'discount' => 20, 'status' => 'tersedia'],
            ['name' => 'Boutique Store', 'category' => 'E-Commerce', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Artist Portfolio', 'category' => 'Portfolio', 'price' => 'Rp179.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Social Media Landing', 'category' => 'Landing Page', 'price' => 'Rp189.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'HR Analytics', 'category' => 'Data Management', 'price' => 'Rp419.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Admin', 'category' => 'SaaS', 'price' => 'Rp299.000', 'originalPrice' => 'Rp399.000', 'discount' => 25, 'status' => 'tersedia'],
            ['name' => 'Magazine Blog', 'category' => 'Blog', 'price' => 'Rp169.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Learning Portal', 'category' => 'Education', 'price' => 'Rp329.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Minimal Dashboard', 'category' => 'Dashboard', 'price' => 'Rp379.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Shoe Store', 'category' => 'E-Commerce', 'price' => 'Rp399.000', 'originalPrice' => 'Rp499.000', 'discount' => 20, 'status' => 'tersedia'],
            ['name' => 'Architecture Portfolio', 'category' => 'Portfolio', 'price' => 'Rp279.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Event Landing V2', 'category' => 'Landing Page', 'price' => 'Rp209.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],

            ['name' => 'Business Portfolio', 'category' => 'Portfolio', 'price' => 'Rp259.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Features Landing', 'category' => 'Landing Page', 'price' => 'Rp249.000', 'originalPrice' => 'Rp349.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Dev Dashboard', 'category' => 'Dashboard', 'price' => 'Rp469.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Team', 'category' => 'SaaS', 'price' => 'Rp229.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Jewelry Store', 'category' => 'E-Commerce', 'price' => 'Rp519.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Food Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Language Portal', 'category' => 'Education', 'price' => 'Rp349.000', 'originalPrice' => 'Rp449.000', 'discount' => 22, 'status' => 'tersedia'],
            ['name' => 'ERP Dashboard', 'category' => 'Data Management', 'price' => 'Rp499.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'SaaS Enterprise', 'category' => 'SaaS', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'One Page Portfolio', 'category' => 'Portfolio', 'price' => 'Rp199.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Promo Landing', 'category' => 'Landing Page', 'price' => 'Rp169.000', 'originalPrice' => 'Rp239.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Handmade Store', 'category' => 'E-Commerce', 'price' => 'Rp329.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Podcast Blog', 'category' => 'Blog', 'price' => 'Rp139.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Academic Portal', 'category' => 'Education', 'price' => 'Rp379.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Metrics Dashboard', 'category' => 'Dashboard', 'price' => 'Rp409.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Growth', 'category' => 'SaaS', 'price' => 'Rp289.000', 'originalPrice' => 'Rp389.000', 'discount' => 26, 'status' => 'tersedia'],
            ['name' => 'Digital Portfolio', 'category' => 'Portfolio', 'price' => 'Rp219.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Startup Landing V2', 'category' => 'Landing Page', 'price' => 'Rp239.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Pet Store', 'category' => 'E-Commerce', 'price' => 'Rp369.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Code Blog', 'category' => 'Blog', 'price' => 'Rp159.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Tutor Portal', 'category' => 'Education', 'price' => 'Rp299.000', 'originalPrice' => 'Rp399.000', 'discount' => 25, 'status' => 'tersedia'],
            ['name' => 'Report Dashboard', 'category' => 'Dashboard', 'price' => 'Rp439.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Service Landing V2', 'category' => 'Landing Page', 'price' => 'Rp219.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Agency Dashboard', 'category' => 'Dashboard', 'price' => 'Rp389.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],

            ['name' => 'Studio Portfolio', 'category' => 'Portfolio', 'price' => 'Rp289.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Landing Pro', 'category' => 'Landing Page', 'price' => 'Rp269.000', 'originalPrice' => 'Rp369.000', 'discount' => 27, 'status' => 'tersedia'],
            ['name' => 'Monitor Dashboard', 'category' => 'Dashboard', 'price' => 'Rp489.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Suite Pro', 'category' => 'SaaS', 'price' => 'Rp339.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Craft Store', 'category' => 'E-Commerce', 'price' => 'Rp409.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Design Blog', 'category' => 'Blog', 'price' => 'Rp179.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Skill Portal', 'category' => 'Education', 'price' => 'Rp369.000', 'originalPrice' => 'Rp469.000', 'discount' => 21, 'status' => 'tersedia'],
            ['name' => 'BI Dashboard', 'category' => 'Data Management', 'price' => 'Rp529.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Pro', 'category' => 'SaaS', 'price' => 'Rp309.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Executive Portfolio', 'category' => 'Portfolio', 'price' => 'Rp249.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Launch Landing', 'category' => 'Landing Page', 'price' => 'Rp199.000', 'originalPrice' => 'Rp279.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Vintage Store', 'category' => 'E-Commerce', 'price' => 'Rp379.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Writing Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => ' Academy Pro', 'category' => 'Education', 'price' => 'Rp399.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Executive Dashboard', 'category' => 'Dashboard', 'price' => 'Rp519.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Scale', 'category' => 'SaaS', 'price' => 'Rp379.000', 'originalPrice' => 'Rp479.000', 'discount' => 21, 'status' => 'tersedia'],
            ['name' => 'Magazine Portfolio', 'category' => 'Portfolio', 'price' => 'Rp229.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Demo Landing', 'category' => 'Landing Page', 'price' => 'Rp249.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Sneaker Store', 'category' => 'E-Commerce', 'price' => 'Rp449.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Vlog Blog', 'category' => 'Blog', 'price' => 'Rp169.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Coding Academy', 'category' => 'Education', 'price' => 'Rp349.000', 'originalPrice' => 'Rp449.000', 'discount' => 22, 'status' => 'tersedia'],
            ['name' => 'Full Dashboard', 'category' => 'Dashboard', 'price' => 'Rp459.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Startup Pro Landing', 'category' => 'Landing Page', 'price' => 'Rp279.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Gallery Portfolio', 'category' => 'Portfolio', 'price' => 'Rp209.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
        ];

        return collect($templates)
            ->map(function (array $template, int $index): array {
                $template['slug'] = Str::slug($template['name']);
                $template['type'] = self::typeFor($template['category'], $index);
                $template['about'] = self::aboutFor($template['category'], $template['name']);
                $template['features'] = self::featuresFor($template['category']);
                $template['techStacks'] = self::techStacksFor($template['category'], $index);
                $template['version'] = '1.0.'.($index % 10);
                $template['demoLink'] = '#';
                $template['license'] = ['Personal', 'Komersial', 'Personal & Komersial'][$index % 3];
                $template['images'] = self::imagesFor($template['slug']);
                $template['lastUpdated'] = '29 Juli 2026';
                $template['preview'] = 'Desktop & Mobile';
                $template['filesIncluded'] = self::filesIncludedFor($template['category']);
                $template['thumbnail'] = 'https://picsum.photos/seed/'.Str::slug($template['name']).'/600/400';

                return $template;
            })
            ->values()
            ->all();
    }

    public static function findBySlug(string $slug): ?array
    {
        return collect(self::all())
            ->firstWhere('slug', $slug);
    }

    private static function typeFor(string $category, int $index): string
    {
        return match ($category) {
            'SaaS' => 'SaaS',
            'Landing Page' => $index % 2 === 0 ? 'Startup' : 'Product',
            'Portfolio' => 'Agency',
            'Dashboard' => $index % 2 === 0 ? 'Business' : 'App',
            'E-Commerce' => $index % 2 === 0 ? 'Business' : 'App',
            'Blog' => 'Personal',
            'Education' => $index % 2 === 0 ? 'Personal' : 'Business',
            'Data Management' => 'Business',
            default => 'Personal',
        };
    }

    private static function aboutFor(string $category, string $name): string
    {
        $descriptions = [
            'Portfolio' => 'Template portfolio modern untuk menampilkan karya dan proyek Anda. Desain bersih, responsif, dan mudah dikustomisasi sesuai kebutuhan.',
            'Landing Page' => 'Template landing page yang dirancang untuk konversi tinggi. Layout yang menarik dan responsif untuk berbagai keperluan bisnis.',
            'Dashboard' => 'Template dashboard admin dengan fitur lengkap. Tampilan data yang jelas dan intuitif untuk pengelolaan sistem.',
            'SaaS' => 'Template lengkap untuk produk SaaS. Includes pricing page, fitur, dan landing section yang terintegrasi.',
            'E-Commerce' => 'Template toko online modern dengan fitur lengkap. Desain yang menarik untuk meningkatkan penjualan produk.',
            'Blog' => 'Template blog minimalis dan elegan. Fokus pada keterbacaan konten dengan desain yang bersih.',
            'Education' => 'Template untuk platform pendidikan. Cocok untuk kursus online, portal akademik, dan learning management system.',
            'Data Management' => 'Template untuk pengelolaan data dan analitik. Tampilan dashboard yang informatif dan mudah digunakan.',
        ];

        return $descriptions[$category] ?? 'Template modern dengan desain profesional dan responsif.';
    }

    private static function featuresFor(string $category): array
    {
        $common = [
            'Desain modern dan profesional',
            'Fully responsive',
            'Mudah dikustomisasi',
            'SEO-friendly',
            'Komponen rapi dan terstruktur',
        ];

        $specific = match ($category) {
            'Portfolio' => ['Gallery interaktif', 'Animasi smooth', 'Mode gelap'],
            'Landing Page' => ['Call-to-action optimal', 'Hero section menarik', 'Testimoni section'],
            'Dashboard' => ['Real-time data', 'Chart interaktif', 'Multi-user support'],
            'SaaS' => ['Pricing table', 'Feature comparison', 'Integrasi payment gateway'],
            'E-Commerce' => ['Keranjang belanja', 'Filter produk', 'Checkout mudah'],
            'Blog' => ['Kategori artikel', 'Search functionality', 'Komentar terintegrasi'],
            'Education' => ['Manajemen kursus', 'Sertifikat digital', 'Tracking progress'],
            'Data Management' => ['Visualisasi data', 'Export/import data', 'Filter dan sorting lanjutan'],
            default => [],
        };

        return array_merge($common, $specific);
    }

    private static function techStacksFor(string $category, int $index): array
    {
        $base = [
            ['label' => 'HTML', 'slug' => 'html5', 'color' => '#e34c26'],
            ['label' => 'Tailwind', 'slug' => 'tailwindcss', 'color' => '#38bdf8'],
            ['label' => 'JavaScript', 'slug' => 'javascript', 'color' => '#f7df1e'],
        ];

        $extra = match ($category) {
            'Portfolio' => [['label' => 'React', 'slug' => 'react', 'color' => '#61dafb'], ['label' => 'Vue', 'slug' => 'vuejs', 'color' => '#42b883']][$index % 2],
            'Landing Page' => [['label' => 'React', 'slug' => 'react', 'color' => '#61dafb'], ['label' => 'Next.js', 'slug' => 'nextjs', 'color' => '#000000'], ['label' => 'Vue', 'slug' => 'vuejs', 'color' => '#42b883']][$index % 3],
            'Dashboard' => [['label' => 'Laravel', 'slug' => 'laravel', 'color' => '#ff2d20'], ['label' => 'React', 'slug' => 'react', 'color' => '#61dafb'], ['label' => 'Vue', 'slug' => 'vuejs', 'color' => '#42b883']][$index % 3],
            'SaaS' => [['label' => 'Laravel', 'slug' => 'laravel', 'color' => '#ff2d20'], ['label' => 'Next.js', 'slug' => 'nextjs', 'color' => '#000000'], ['label' => 'React', 'slug' => 'react', 'color' => '#61dafb']][$index % 3],
            'E-Commerce' => [['label' => 'Laravel', 'slug' => 'laravel', 'color' => '#ff2d20'], ['label' => 'PHP', 'slug' => 'php', 'color' => '#777bb4']][$index % 2],
            'Blog' => [['label' => 'Laravel', 'slug' => 'laravel', 'color' => '#ff2d20'], ['label' => 'Vue', 'slug' => 'vuejs', 'color' => '#42b883']][$index % 2],
            'Education' => [['label' => 'Laravel', 'slug' => 'laravel', 'color' => '#ff2d20'], ['label' => 'React', 'slug' => 'react', 'color' => '#61dafb']][$index % 2],
            'Data Management' => [['label' => 'Laravel', 'slug' => 'laravel', 'color' => '#ff2d20'], ['label' => 'React', 'slug' => 'react', 'color' => '#61dafb'], ['label' => 'Node.js', 'slug' => 'nodejs', 'color' => '#339933']][$index % 3],
            default => ['label' => 'Laravel', 'slug' => 'laravel', 'color' => '#ff2d20'],
        };

        return array_merge($base, [$extra]);
    }

    private static function imagesFor(string $slug): array
    {
        return collect(range(1, 10))
            ->map(fn ($i) => "https://picsum.photos/seed/{$slug}-{$i}/1200/521")
            ->all();
    }

    private static function filesIncludedFor(string $category): string
    {
        return match ($category) {
            'Dashboard' => 'HTML, Tailwind, JavaScript, Laravel, Database',
            'E-Commerce' => 'HTML, Tailwind, JavaScript, Laravel, Images, Database',
            'SaaS' => 'HTML, Tailwind, JavaScript, Laravel, React, Images',
            default => 'HTML, Tailwind, JavaScript, Laravel, Images',
        };
    }
}
