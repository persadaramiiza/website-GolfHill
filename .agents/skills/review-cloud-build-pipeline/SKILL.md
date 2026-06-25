---
name: review-cloud-build-pipeline
description: Review cloud build and deployment pipelines for correctness, security, reliability, cost, and release risk. Use when inspecting `cloudbuild.yaml`, Google Cloud Build triggers, Docker build steps, Artifact Registry pushes, Cloud Run deploys, CI/CD YAML, build logs, failed deployments, or pull requests that change build, deploy, secrets, IAM, cache, test, migration, or rollback behavior.
---

# Review Cloud Build Pipeline

## Overview

Use this skill to perform a code-review style assessment of a cloud build pipeline. Prioritize concrete defects, unsafe release behavior, missing verification, and operational risks over broad best-practice commentary.

## Workflow

1. Locate the pipeline entrypoints before reviewing: `cloudbuild.yaml`, `.github/workflows/`, `Dockerfile`, deploy scripts, environment templates, infrastructure files, and docs that define triggers or deployment targets.
2. Identify the actual release path: source event, build image, dependency install, test gates, artifact publish, database or asset steps, deploy command, traffic switch, and post-deploy verification.
3. Read changed files and nearby configuration before forming findings. If the user asks for a review, lead with bugs and risks ordered by severity, with file and line references.
4. Use [references/review-checklist.md](references/review-checklist.md) for a full review or when the pipeline touches production, secrets, IAM, deployments, migrations, or rollbacks.
5. Verify claims with local commands when safe and available. Prefer dry-run, lint, config validation, unit tests, and parsing commands over live deployment commands unless the user explicitly asks.
6. Distinguish confirmed findings from assumptions. State when live cloud state, trigger settings, IAM permissions, secret values, or registry contents were not accessible.

## Review Focus

- **Correctness**: Confirm step ordering, substitutions, image tags, paths, build contexts, artifact names, region/project variables, and deploy target names are consistent.
- **Verification gates**: Check that dependency installation, tests, static analysis, migrations, asset compilation, and smoke checks run before production traffic changes.
- **Security**: Look for plaintext secrets, broad service-account permissions, unpinned external actions/images, accidental `.env` inclusion, unsafe Docker contexts, and overexposed deployment flags.
- **Reliability**: Check rollback path, traffic strategy, idempotency, timeout settings, cache behavior, transient failure handling, and whether failed post-deploy work can leave production half-updated.
- **Observability**: Confirm logs, build output, release identifiers, image tags, and post-deploy checks make failures diagnosable.
- **Cost and speed**: Flag wasteful dependency rebuilds, missing cache opportunities, oversized Docker contexts, and unnecessary steps only after higher-severity release risks.

## Output Format

For a review request:

- Start with findings, not a summary.
- Order findings by severity.
- Include file and line references for each confirmed issue.
- Explain the failure mode and the practical consequence.
- Suggest the smallest concrete fix when clear.
- If no issues are found, say so directly and mention remaining gaps such as unverified cloud permissions or trigger settings.

For a fix request:

- Inspect first, then edit only the pipeline files needed.
- Preserve existing deployment architecture unless the user asks for a redesign.
- Avoid running commands that deploy, mutate cloud state, rotate secrets, delete artifacts, or change traffic without explicit user approval.
- After edits, validate syntax and run the nearest safe local checks. Report any checks that could not be run.
