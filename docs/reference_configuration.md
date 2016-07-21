#Configuration Reference

All available configuration options are listed below with their default values.
```yml
ben_gor_file:
    file_class:
        file:
            class: ~                                        # Required
            filesystem:
                gaufrette: ~                                # Already configured Gaufrette filesystem
                symfony: ~                                  # Symfony filesystem path, e.g: %kernel.root_dir%/../web/file
            persistence: doctrine_orm                       # Also, it can be "doctrine_odm_mongodb"
            data_transformer: BenGorFile\File\Application\DataTransformer\FileDTODataTransformer
```

> **REMEMBER:** *Gaufrette* and *Symfony* filesystems are null by default, but one of these filesystems must
> be configured. Keep in mind that the `gaufrette` option requires `knplabs/knp-gaufrette-bundle`
> If you configure all filesystems, DIC will use the Gaufrette to generate the services on the fly.