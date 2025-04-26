<?php

declare(strict_types=1);

namespace Locastic\SyliusComparerPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

// final class Configuration implements ConfigurationInterface
// {
//     /**
//      * {@inheritdoc}
//      */
//     public function getConfigTreeBuilder(): TreeBuilder
//     {
//         $treeBuilder = new TreeBuilder();
//         $rootNode = $treeBuilder->root('locastic_sylius_comparer_plugin');

//         return $treeBuilder;
//     }
// }

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        // Symfony 4.3+ requiere el nombre en el constructor
        $treeBuilder = new TreeBuilder('locastic_sylius_comparer_plugin');
        
        // Para mantener compatibilidad con versiones antiguas
        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // Fallback para Symfony < 4.3 (no necesario si solo soportas Symfony 4.3+)
            $rootNode = $treeBuilder->root('locastic_sylius_comparer_plugin');
        }

        return $treeBuilder;
    }
}
