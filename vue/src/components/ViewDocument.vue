<script setup lang="ts">
  import { useRoute } from 'vue-router';

  const route = useRoute();
  const documentId = route.params.id;

  interface Document {
    uuid: string,
    name: string,
    description: string,
    version_number: string,
    file_path: string
  }

  let document = {};

  async function fetchDocument(): Promise<Document[]> {
    const response = await fetch(`https://host/api/document/${documentId}`);
    const data: Document[] = await response.json();
    return data;
  }
  
  fetchDocument()
    .then(documentData => {
      document = documentData;
    });
</script>

<template>
    <div>
      <div>{{ document.uuid }}</div>
      <div>{{ document.name }}</div>
      <div>{{ document.description }}</div>
      <div>{{ document.version_number }}</div>
      <div>{{ document.file_path }}</div>
    </div>
</template>