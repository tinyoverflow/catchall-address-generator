# 🏷 Catch-All Address Generator

![Build Status](https://github.com/tinyoverflow/catchall-address-generator/actions/workflows/docker.yml/badge.svg)
![Version](https://img.shields.io/github/v/tag/tinyoverflow/catchall-address-generator?label=Version&sort=semver)
![Updated](https://img.shields.io/github/last-commit/tinyoverflow/catchall-address-generator?label=Updated)

This tool generates email addresses for specific services with your domain name. It is especially useful if you want one
email address per service which cannot be guessed and can be recreated easily, if necessary.

![Project Screenshot](/../docs/screenshots/screenshot_1.png?raw=true)

## Usage

This service is available as a Docker image, so you can get up and running in just a minute. The image is available
at `ghcr.io/tinyoverflow/catchall-address-generator:latest`. All tags can be found at
the [GitHub container registry](https://github.com/tinyoverflow/catchall-address-generator/pkgs/container/catchall-address-generator)
.

While this container does not require any additional dependencies or port mappings, it requires the configuration of
some environment variables to work properly.

### Environment variables

| Variable    | Type    | Required | Default      | Description                                                        |
|-------------|---------|----------|--------------|--------------------------------------------------------------------|
| HASH_SALT   | string  | Yes      | empty string | A random string that will be used as a salt for the hash function. |
| MAIL_DOMAIN | string  | Yes      | example.com  | Domain without @-symbol for which the address will be generated.   |
| MAIL_LENGTH | integer | No       | 16           | Length of the part before the @-symbol.                            |

### Start Docker container

```sh
# Download the current image.
$ docker pull ghcr.io/tinyoverflow/catchall-address-generator:latest

# Run the docker container.
$ docker run --name catchall-address-generator --detach \
    -e "HASH_SALT=enter_your_key_here" \
    -e "MAIL_DOMAIN=domain.tld" \
    -e "MAIL_LENGTH=8" \
    ghcr.io/tinyoverflow/catchall-address-generator:latest
```
