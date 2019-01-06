* backup database

```bash
    pg_dump dbname > outfile
```

* restore database

```bash
    psql dbname < infile
```

* to test NLP please use file test_nlp.py by running cmd:
cd xeras/backend
python -W ignore test_nlp.py