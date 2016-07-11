<?php

/*
 * This file is part of the BenGorFile package.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BenGorFile\FileBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * BenGor file bundle configuration class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('ben_gor_file')
            ->children()
                ->arrayNode('file_class')->requiresAtLeastOneElement()
                ->prototype('array')
                    ->children()
                        ->scalarNode('class')
                            ->isRequired(true)
                        ->end()
                        ->scalarNode('persistence')
                            ->defaultValue('doctrine')
                            ->validate()
                            ->ifNotInArray(['doctrine'])
                                ->thenInvalid('Invalid persistence layer "%s"')
                            ->end()
                        ->end()
                        ->arrayNode('filesystem')
                            ->children()
                                ->scalarNode('gaufrette')
                                    ->defaultValue(null)
                                ->end()
                                ->scalarNode('symfony')
                                    ->defaultValue(null)
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}