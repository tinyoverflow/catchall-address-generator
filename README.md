# 🏷 Catch-All Address Generator

![Build Status](https://github.com/tinyoverflow/catchall-address-generator/actions/workflows/docker.yml/badge.svg)
![Version](https://img.shields.io/github/v/tag/tinyoverflow/catchall-address-generator?label=Version&sort=semver)
![Updated](https://img.shields.io/github/last-commit/tinyoverflow/catchall-address-generator?label=Updated)

This tool generates email addresses for specific services with your domain name. It is especially useful if you want one
email address per service which cannot be guessed and can be recreated easily, if necessary.

## Usage

This service is available as a Docker image, so you can get up and running in just a minute. The image is available
at `ghcr.io/tinyoverflow/catchall-address-generator:latest`. All tags can be found at
the [GitHub container registry](https://github.com/tinyoverflow/catchall-address-generator/pkgs/container/catchall-address-generator)
.

While this container does not require any additional dependencies or port mappings, it requires the configuration of
some environment variables to work properly.

### Environment variables

| Variable      | Type   | Required | Description                                                        |
|---------------|--------|----------|--------------------------------------------------------------------|
| HASH_SALT     | string | Yes      | A random string that will be used as a salt for the hash function. |

### Start Docker container

```sh
# Download the current image.
$ docker pull ghcr.io/tinyoverflow/catchall-address-generator:latest

# Run the docker container.
$ docker run --name catchall-address-generator --detach \
    -e "HASH_SALT=enter_your_key_here" \
    ghcr.io/tinyoverflow/catchall-address-generator:latest
```
