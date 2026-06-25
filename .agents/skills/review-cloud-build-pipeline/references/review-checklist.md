# Cloud Build Pipeline Review Checklist

Use this checklist for full reviews and production-impacting pipeline changes.

## Build Definition

- Confirm `steps`, `args`, `entrypoint`, `dir`, `env`, `secretEnv`, `waitFor`, and `timeout` are valid for the declared builder images.
- Confirm substitutions are defined, consistently named, and safe when omitted.
- Confirm image names include explicit project, region, repository, service, and tag behavior.
- Confirm all paths match the repo layout and Docker build context.
- Confirm build artifacts are produced before deploy steps reference them.

## Docker And Dependencies

- Check Dockerfile stages, base image pinning, copied files, excluded files, and runtime command.
- Confirm `.dockerignore` excludes `.git`, local env files, caches, tests only when appropriate, and bulky generated output.
- Check dependency install reproducibility through lockfiles and deterministic commands.
- Flag network downloads in deploy/runtime steps when they belong in build steps.

## Security And Secrets

- Flag plaintext secrets in YAML, scripts, Dockerfile, logs, substitutions, and committed env files.
- Prefer `availableSecrets` or secret manager references over inline secret values.
- Confirm build service account and deploy service account are separate when possible.
- Flag broad IAM roles when narrower roles would satisfy build, registry, and deploy actions.
- Check for unpinned third-party builder images, scripts from remote URLs, and shell commands that expose secrets.

## Verification Gates

- Confirm tests, linters, static analysis, or framework health checks run before artifact publish or deploy when feasible.
- Confirm database migrations are ordered, idempotent, backed up, and not hidden inside image startup unless intentional.
- Confirm frontend asset compilation and backend cache/config steps match production runtime expectations.
- Confirm failure in a verification step stops the pipeline.

## Deployment Safety

- Confirm deploy commands target the intended project, region, service, platform, and image digest or immutable tag.
- Prefer deploy by digest or unique commit tag over mutable `latest` for production.
- Check traffic behavior: immediate full traffic, no traffic, canary, rollback, or manual promotion.
- Confirm post-deploy smoke checks run against the deployed revision or service URL.
- Confirm rollback is documented or mechanically simple.

## Reliability And Operations

- Check timeouts, retries, and step dependencies for long builds and transient cloud failures.
- Confirm build logs are useful and do not hide critical failures behind `|| true`.
- Check that release identifiers connect source commit, image, deployed revision, and logs.
- Confirm cleanup tasks do not delete active artifacts or shared caches.

## Review Output

- Report confirmed issues first with severity and file/line references.
- Separate assumptions and unverified cloud state from confirmed source findings.
- Mention safe validation commands run, plus checks skipped because they would require live cloud access or deployment.
