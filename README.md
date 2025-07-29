## PHP 8.4 RPM Build Process

This repository contains Docker-based infrastructure to build RPM packages for PHP 8.4 and its extensions for **Rocky Linux 9 and 10**.

You can run the build locally or use the automated GitHub Actions workflow.

---

## Requirements (one-time per build host)

### 1. Docker

Install **Docker CE 20.10.0+** following the official guide:  
https://docs.docker.com/engine/install/

### 2. Add current user to Docker group

```bash
sudo usermod -aG docker $(whoami)
```

Then **logout and login again** to apply changes.

### 3. Enable and start Docker daemon

```bash
sudo systemctl enable docker
sudo systemctl start docker
```

---

## Repository Setup

Clone the repository with all submodules:

```bash
git clone --recursive https://github.com/aursu/rpmbuild-php-8.4.git
cd rpmbuild-php-8.4
```

---

## Build Process

### 1. Build Base and Builder Images

```bash
docker compose -f docker-compose.base.yml build --no-cache --pull
docker compose build --no-cache
```

*Note: This will build images for both Rocky 9 and Rocky 10.*

### 2. Run the Build

You can run all build services:

```bash
docker compose up -d
```

Or run specific builder container:

```bash
docker compose run --rm rocky9build
# or
docker compose run --rm rocky10build
```

### 3. Wait for Completion

Check containers’ statuses:

```bash
docker compose ps
```

Wait until all build containers exit with status `Exit 0`.

---

## Accessing RPM Packages

Resulting `.rpm` files will be located in Docker volumes:

- For **Rocky 9**: `rpm9rocky`
- For **Rocky 10**: `rpm10rocky`

To extract them:

```bash
docker run --rm -v rpm9rocky:/data alpine ls /data
docker run --rm -v rpm10rocky:/data alpine ls /data
```

Or mount them to local folders using a helper container.

---

## Clean Up

To stop and remove build containers:

```bash
docker compose down
```

To also remove images:

```bash
docker image prune
# or more selectively:
docker rmi <image_name>
```

---

## GitHub Actions (CI/CD)

This repository supports automated builds via GitHub Actions.

On push, it:
- Builds Docker images and RPMs for Rocky 9 & 10.
- Uploads them to Artifactory (JFrog) or GitHub Container Registry.
- Supports `skip-rpm-*` branches to skip the build process.

Workflow file: `.github/workflows/rpm.yml`

---

## Notes

- Ensure you have enough free space (~5–10 GB recommended).
- For PHP extensions or version bumps, edit the Dockerfiles in relevant folders.
