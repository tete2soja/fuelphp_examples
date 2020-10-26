# FuelPHP cli commands

## Generate CRUD model

```bash
# id is added by default to the model as the PK
php oil generate model MODEL_NAME sku:int name:varchar description:text --crud
```

## Configure default folders (logs, cache...)

```bash
php oil refine install
```

## Update database schema

```bash
php oil refine migrate:[up|down|run|current]
```